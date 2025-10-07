<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//OPTIONAL because laravel understands the moment u use them, but still good to have 
use App\Models\Project;

class Technology extends Model
{
    use HasFactory;

    public function projects()
{
    return $this->belongsToMany(Project::class);
}
}
