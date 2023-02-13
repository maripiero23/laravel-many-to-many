<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "description", "user_id", "cover_img", "github_link"
    ];

    public function Type(){
        return $this->belongsTo(Type::class);
    }

    //un progetto può avere molti tecnologie
    public function Technology(){
        return $this->belongsToMany(Technology::class);
    }
}
