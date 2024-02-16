<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id','id')->select('id','name');
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id')->select('id','name');
    }
}
