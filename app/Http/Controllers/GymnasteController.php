<?php

namespace App\Http\Controllers;

use App\Models\Gymnaste;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class GymnasteController extends Controller
{
    // Affiche la liste de tous les gymnastes
    public function index()
    {
        $gymnastes = Gymnaste::all();
        return view('gymnastes.index', compact('gymnastes'));
    }

    // Affiche le formulaire de création d'un nouveau gymnaste
    public function create()
    {
        return view('gymnastes.create');
    }

    // Stocke un nouveau gymnaste dans la base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'club'           => 'required|string|max:255',
            'discipline'     => 'required|in:GAM,GAF,GR,PK,AERO',
            'photo_profil'   => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo_profil')) {
            $filename = time() . '.' . $request->photo_profil->getClientOriginalExtension();
            $request->photo_profil->storeAs('photos_profil', $filename, 'public');
            $validatedData['photo_profil'] = 'photos_profil/' . $filename;
        }

        // Génération d'un code unique pour le gymnaste
        $validatedData['unique_code'] =  'G-'.strtoupper(Str::random(8));


        $gymnaste = Gymnaste::create($validatedData);

        // Génération du PDF pour le gymnaste
        $data = ['gymnaste' => $gymnaste];
        $pdf = PDF::loadView('gymnastes.pdf.gymnaste_identity', $data);
        $pdfFileName = 'pdfs/gymnaste_' . $gymnaste->nom .  $gymnaste->unique_code . '.pdf';
        $pdf->save(public_path($pdfFileName));

        $gymnaste->update(['pdf_path' => $pdfFileName]);

        return redirect()->route('home')->with('success', 'Gymnaste inscrit et PDF généré.');
    }

    // Affiche les détails d'un gymnaste (optionnel)
    public function show(Gymnaste $gymnaste)
    {
        return view('gymnastes.show', compact('gymnaste'));
    }

    // Affiche le formulaire d'édition d'un gymnaste existant
    public function edit(Gymnaste $gymnaste)
    {
        return view('gymnastes.edit', compact('gymnaste'));
    }

    // Met à jour les informations d'un gymnaste
    public function update(Request $request, Gymnaste $gymnaste)
    {
        $validatedData = $request->validate([
            'nom'           => 'required|string|max:255',
            'prenom'        => 'required|string|max:255',
            'date_naissance'=> 'required|date',
            'lieu_naissance'=> 'required|string|max:255',
            'club'          => 'required|string|max:255',
            'discipline'    => 'required|in:GAM,GAF,GR,PK,AERO',
            'photo_profil'  => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo_profil')) {
            $filename = time() . '.' . $request->photo_profil->getClientOriginalExtension();
            $request->photo_profil->storeAs('photos_profil', $filename, 'public');
            $validatedData['photo_profil'] = 'photos_profil/' . $filename;
        }

        $gymnaste->update($validatedData);

        return redirect()->route('gymnastes.index')->with('success', 'Gymnaste mis à jour avec succès.');
    }

    // Supprime un gymnaste de la base de données
    public function destroy(Gymnaste $gymnaste)
    {
        $gymnaste->delete();
        return redirect()->route('gymnastes.index')->with('success', 'Gymnaste supprimé avec succès.');
    }

    public function generatePDF(Gymnaste $gymnaste)
    {
        $data = ['gymnaste' => $gymnaste];
        $pdf = PDF::loadView('pdf.gymnaste_identity', $data);
        return $pdf->download('gymnaste_' . $gymnaste->id . '_identity.pdf');
    }
}
