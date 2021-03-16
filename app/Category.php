<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            if(!empty($model->slug))
                return true;

            $newSlug = $slug = str_slug($model->nombre);

            // Loop until we can query for the slug and it returns false
            $next = 0;
            while (Category::where('slug', '=', $newSlug)->first()) {
                $newSlug = $slug . '-' . $next;
                $next++;
            }

            $model->slug = $newSlug;

            return true;
        });
    }

    public function parent() {
        return $this->belongsTo(Category::class,'parent_id')->withDefault();
    }

    public function children() {
        return $this->hasMany(Category::class,'parent_id')->orderBy('nombre','ASC');
    }

}
