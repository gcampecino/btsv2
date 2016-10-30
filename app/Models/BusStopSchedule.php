<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusStopSchedule extends Model
{
    //
    protected $table = 'bus_stop_schedule';
    public $timestamps = true;

    /**
     * Get the post that owns the comment.
     */
    public function busStop()
    {
        return $this->belongsTo('App\Models\BusStop');
    }

    /**
     * Get the post that owns the comment.
     */
    public function bus()
    {
        return $this->belongsTo('App\Models\Bus');
    }
}
