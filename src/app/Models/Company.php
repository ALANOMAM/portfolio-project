<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//OPTIONAL because laravel understands the moment u use them, but still good to have 
use App\Models\User;


class Company extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'logo','website' ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

