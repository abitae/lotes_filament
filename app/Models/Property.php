<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'address',
        'city',
        'state',
        'zip_code',
        'price',
        'property_type',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'lot_size',
        'year_built',
        'description',
        'measurements',
        'location',
        'area',
        'frontage_measurement',
        'status_id',
        'project_id'
    ];

    public function status()
    {
        return $this->belongsTo(PropertyStatus::class, 'status_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function media()
    {
        return $this->hasMany(PropertyMedia::class);
    }

    public function documents()
    {
        return $this->hasMany(PropertyDocument::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
