<?php namespace DashboardersHeaven;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GamesGamersPivot extends Pivot
{
    public function setLastUnlockAttribute($value)
    {
        $this->attributes['last_unlock'] = Carbon::parse($value)->toDateTimeString();
    }
}
