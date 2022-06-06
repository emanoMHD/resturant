<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'translation_lang','translation_of', 'name', 'photo', 'active','price','quantity', 'created_at', 'updated_at','category_id'
    ];
    protected $hidden = ['category_id'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id','translation_lang', 'name', 'price','quantity', 'photo', 'active', 'translation_of','category_id');
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

        return $this->belongsTo('App\Models\SubCategory', 'category_id', 'id');
    }



    
    public function categories()
    {
        return $this->hasMany(self::class, 'translation_of');
    }
    //get main category of subcategory
    public  function subCategory(){
        return $this -> belongsTo('App\Models\SubCategory','category_id','id');
    }


}
