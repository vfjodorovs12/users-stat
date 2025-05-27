<?php

namespace Vfjodorovs12\UsersStat\Models;

use Illuminate\Database\Eloquent\Model;

class FleetAttendance extends Model
{
    protected $table = 'fleet_attendance';
    protected $fillable = ['character_id', 'fleet_id', 'attended_at'];
    public $timestamps = false;
}
