<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDocument extends Model
{
    use HasFactory;

    protected $table = 'property_documents';

    protected $fillable = [
        'property_id',
        'document_type',
        'document_data',
        'description'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
