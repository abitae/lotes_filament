<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyStatus extends Model
{
    use HasFactory;

    protected $table = 'property_status';

    protected $fillable = [
        'status_name',
        'description'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
