<?php

namespace App\Models;

use App\Models\Classe;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $table ='enseignants';
    protected $fillable = [
        'matricule',
        'prenom',
        'nom',
        'specialite',
        'email',
        'portable',
        'user_id',
    ];
    
    public function classes(){
        return $this->hasOne(Classe::class);
    }
    public function stages(){
        return $this->hasMany(Stage::class);
    }
}
