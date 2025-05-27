<?php

namespace Vfjodorovs12\UsersStat\Models;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    protected $table = 'corporation_pilots';
    protected $fillable = ['character_id', 'character_name'];
    public $timestamps = false;

    public function fleetStats()
    {
        return $this->hasMany(FleetAttendance::class, 'character_id', 'character_id');
    }
}
