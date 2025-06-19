<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'complainant_name',
        'phone_number',
        'subcounty',
        'ward',
        'new_area',
        'infrastructure_type',
        'damage_description',
        'severity_level',
        'location_details',
        'status',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
