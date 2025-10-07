<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//OPTIONAL because laravel understands the moment u use them, but still good to have 
use App\Models\User;
use App\Models\Category;
use App\Models\Technology;

class Project extends Model
{
        use HasFactory;


        protected $fillable = ['user_id','category_id','title', 'description','project_link','image','video'];

        public function user(){
               return $this->belongsTo(User::class);
        }

        public function category(){
            return $this->belongsTo(Category::class);
        }

        public function technologies()
        {
            return $this->belongsToMany(Technology::class);
        }

    
}




