<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gymnaste extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'club',
        'discipline',
        'photo_profil',
        'unique_code',
        'pdf_path'
    ];
}


