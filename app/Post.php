<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title','slug','content','online','category_id','tags_list'];
    
    public function category()
    {
        return $this->belongsTo('\App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getTagsListAttribute()
    {
        if ($this->id) {
            return $this->tags->pluck('id');
        }
    }

    public function setTagsListAttribute($value)
    {
        // dd($value);
        return $this->tags()->sync($value);
    }

    /**
     *Ce scope nous permetra de récupérer tous les articles publiés
     */
    public function scopePublished($query)
    {
        // return $query->where('online', true);
        // return $query->where('online', true)->whereRaw('created_at < NOW()');
        return $query->where('online', true)->where('created_at', '<', DB::raw('NOW()'));
    }

    public function scopeSearchByTitle($query, $q)
    {
        return $query->where('title', 'LIKE', '%'.$q. '%' );
    }

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=strtolower($value);
    }

    public function setSlugAttibute($value)
    {
        if (empty($value)) {
            $this->attributes['slug']=Str::slug($this->title);
        }
    }

    public function getDates()
    {
        return['created_at','update_at','published_at'];
    }

    //public function getRoutesKey ôur modifier notre routes qd utilise la methode va elle sera modifié
}
