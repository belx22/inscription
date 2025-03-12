<?php

namespace App\Http\Controllers;

use App\Models\Juge;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class JugeController extends Controller
{
    // Affiche la liste de tous les juges
    public function index()
    {
        $juges = Juge::all();
        return view('juges.index', compact('juges'));
    }

    // Affiche le formulaire de création d'un nouveau juge
    public function create()
    {
        return view('juges.create');
    }

    // Stocke un nouveau juge dans la base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'categorie'      => 'required|string|max:255',
            'discipline'     => 'required|in:GAM,GAF,PK,AERO,GR',
            'photo_profil'   => 'nullable|image|max:2048'
        ]);

        // Gestion du téléchargement de la photo de profil
        if ($request->hasFile('photo_profil')) {
            $filename = time() . '.' . $request->photo_profil->getClientOriginalExtension();
            $request->photo_profil->storeAs('photos_profil', $filename, 'public');
            $validatedData['photo_profil'] = 'photos_profil/' . $filename;
        }

        // Génération d'un code unique (8 caractères alphanumériques en majuscules)
        $validatedData['unique_code'] = 'J-'.strtoupper(Str::random(8));

        // Création de l'enregistrement
        $juge = Juge::create($validatedData);

        // Génération automatique du PDF de la carte d'identité ou licence sportive
        $data = ['juge' => $juge];
        $pdf = PDF::loadView('juges.pdf.juge_identity', $data);

        // Sauvegarde du PDF dans le dossier public/pdfs avec le code unique dans le nom
        $pdfFileName = 'pdfs/juge_' . $juge->nom.  $juge->unique_code .'.pdf';
        $pdf->save(public_path($pdfFileName));

        // Optionnel : enregistrement du chemin du PDF dans l'enregistrement
        $juge->update(['pdf_path' => $pdfFileName]);

        // Redirection avec message de succès
        return redirect()->route('home')->with('success', 'Juge inscrit et PDF généré.');
    }

    // Affiche les détails d'un juge (optionnel)
    public function show(Juge $juge)
    {
        return view('juges.show', compact('juge'));
    }

    // Affiche le formulaire d'édition d'un juge existant
    public function edit(Juge $juge)
    {
        return view('juges.edit', compact('juge'));
    }

    // Met à jour les informations d'un juge
    public function update(Request $request, Juge $juge)
    {
        $validatedData = $request->validate([
            'nom'           => 'required|string|max:255',
            'prenom'        => 'required|string|max:255',
            'date_naissance'=> 'required|date',
            'categorie'     => 'required|string|max:255',
            'discipline'    => 'required|in:GAM,GAF,PK,AERO,GR',
            'photo_profil'  => 'nullable|image|max:2048'
        ]);
    
        if ($request->hasFile('photo_profil')) {
            $filename = time() . '.' . $request->photo_profil->getClientOriginalExtension();
            $request->photo_profil->storeAs('photos_profil', $filename, 'public');
            $validatedData['photo_profil'] = 'photos_profil/' . $filename;
        }
    
        $juge->update($validatedData);
    
        return redirect()->route('juges.index')->with('success', 'Juge mis à jour avec succès.');
    }
    // Supprime un juge de la base de données
    public function destroy(Juge $juge)
    {
        $juge->delete();
        return redirect()->route('juges.index')->with('success', 'Juge supprimé avec succès.');
    }

    public function generatePDF(Juge $juge)
    {
        // Transmettez les données du juge à la vue de template
        $data = ['juge' => $juge];
        
        // Chargez la vue et générez le PDF
        $pdf = PDF::loadView('juges.pdf.juge_identity', $data);

        // Retourne le PDF pour téléchargement
        return $pdf->download('juge_' . $juge->id . '_identity.pdf');
    }
}
