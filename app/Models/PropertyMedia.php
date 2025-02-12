<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMedia extends Model
{
    use HasFactory;

    protected $table = 'property_media';

    protected $fillable = [
        'property_id',
        'media_type',
        'media_data',
        'description'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
