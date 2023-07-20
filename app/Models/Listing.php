<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Images;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'title',
        'price',
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne(Categories::class, 'id');
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }

}
