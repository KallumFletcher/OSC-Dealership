<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer',
        'model',
        'price',
        'mileage',
        'img_path',
    ];
}
