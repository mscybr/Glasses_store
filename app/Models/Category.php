<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "categoryName"
    ];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class); // links this->id to events.course_id
    }
}
