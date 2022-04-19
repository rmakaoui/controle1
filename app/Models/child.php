<?php
namespace App\Models;


trait child{
    public static function booted(){
        static::addGlobalScope(static::class, function($builder){
            $builder->where('type', static::class);
        });
    }

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $professeur->forceFill(['type'=>static::class]);
        });
    }
}
