<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'license_number',
        'image',
        'status',
        'manager_id',
    ];

    public function manager()
    {
        return $this->belongsTo(Agent::class, 'manager_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Agent::class, 'manager_id');
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
