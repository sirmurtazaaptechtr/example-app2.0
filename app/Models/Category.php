<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Category extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'categories';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'CategoryID';

    /**
     * The schema has no created_at / updated_at columns.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'CategoryName',
        'Description',
    ];

    /**
     * Products belonging to this category.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'CategoryID', 'CategoryID');
    }
}
