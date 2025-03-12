<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    /** @use HasFactory<\Database\Factories\MovementsFactory> */
    use HasFactory, HasUlids;

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'type',
        'value',
        'category_id',
        'description'
    ];

    public function categories () {
        return $this->belongsTo(Category::class);
    }
}
