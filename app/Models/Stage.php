<?php

namespace App\Models;
use App\Models\Classe;
use App\Models\Etudiant;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;


    protected $fillable = [
        'entreprise',
        'secteur_activite',
        'lieu',
        'theme', 
        'tuteur_entreprise', 
        'tuteur_entreprise_tel', 
        'tuteur_entreprise_email', 
        'date_debut', 
        'date_fin', 
        'fiche',
        'voeux_ens1',
        'voeux_ens2',
        'voeux_ens3',
        'etudiant_id',
        'enseignant_id',
        'classe_id',
    ];
    
    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }
    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
