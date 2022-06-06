<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'translation_lang','translation_of', 'sub_name', 'slug', 'photo', 'active', 'created_at', 'updated_at','category_id'
    ];
    protected $hidden = ['category_id'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id','translation_lang', 'sub_name', 'photo', 'active', 'translation_of','category_id');
    }
    public function scopeDefaultCategory($query){
        return  $query -> where('translation_of',0);
    }
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

        
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';

    }

    public function category()
    {

        return $this->belongsTo('App\Models\MainCategory', 'category_id', 'id');
    }

    public  function products(){
        return $this -> hasMany(Products::class,'category_id','id');
    }


    
    public function categories()
    {
        return $this->hasMany(self::class, 'translation_of');
    }
    //get main category of subcategory
    public  function mainCategory(){
        return $this -> belongsTo('App\Models\MainCategory','category_id','id');
    }


}
