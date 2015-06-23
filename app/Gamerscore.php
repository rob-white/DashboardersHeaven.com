<?php namespace DashboardersHeaven;

use Illuminate\Database\Eloquent\Model;

class Gamerscore extends Model
{
    protected $table = 'gamerscores';

    protected $fillable = [
        'gamer_id',
        'score',
    ];

    /**
     * Get the gamer for a gamerscore.
     *
     */
    public function gamer()
    {
        $this->belongsTo('DashboardersHeaven\Gamer');
    }
}
