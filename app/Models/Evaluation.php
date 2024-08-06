<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Matiere;

class Evaluation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function etudiant(){
        $this->belongsto(Etudiant::class);
    }

    public function user(){
        $this->belongsto(User::class);
    }
}
