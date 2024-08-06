<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matiere;



class UE extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function matieres(){
        return $this->hasmany(Matiere::class);
    }
}
