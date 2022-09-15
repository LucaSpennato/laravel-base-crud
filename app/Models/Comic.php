<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'series',
        'sale_date',
        'type',
        'slug'
    ];
}
