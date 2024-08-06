<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UE;
use App\Models\Etudiant;



class Matiere extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ue(){
        return this->belongsto(UE::class);
    }

    public function etudiants(){
        return $this->hasmany(Etudiant::class);
    }
}
