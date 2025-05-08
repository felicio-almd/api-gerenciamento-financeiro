<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    /** @use HasFactory<\Database\Factories\MovementsFactory> */
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'type',
        'value',
        'category_id',
        'user_id',
        'description'
    ];

    public function categories () {
        return $this->belongsTo(Category::class);
    }

    public function users () {
        return $this->belongsTo(User::class);
    }
}
