<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function categories()
    {
        // This the Relation with Category Model.
        return $this->belongsTo(Categories::class,'category_id','id')->select('id','name');
    }
}
