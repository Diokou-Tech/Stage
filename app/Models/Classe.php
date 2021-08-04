<?php

namespace App\Models;
use App\Models\Stage;
use App\Models\Etudiant;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;
    protected $table ='classes';
    protected $fillable = [
     
        'id',
        'nom',
        'niveau',
        'annee',
        'enseignant_id',
        
    ];


    public function enseignant(){
        return $this->belongsTo(Enseignant::class);
    }

    public function etudiants(){
        return $this->hasMany(Etudiant::class);
    }
    public function stages(){
        return $this->hasMany(Stage::class);
    }
}
