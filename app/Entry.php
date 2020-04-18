<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Entry extends Model
{
    // $entry->user
    // Entry N - 1 User
    // Eager loading
    public function user(){
        return $this->belongsTo(User::class);
    }

    //mutator convierte todo en minuscula
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    //Para que laravel no busque por id 
    //public function getRouteKeyName(){
    //    return 'slug';
    //}

    //Metodo publico
    public function getUrl(){
        return url("entries/$this->slug-$this->id");
    }
}
