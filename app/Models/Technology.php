<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;


    //una tecnologia può essere usata in molti progettiS
    public function Project(){
        return $this->belongsToMany(Project::class);
    }
}
