<?php namespace DashboardersHeaven;

use Illuminate\Database\Eloquent\Model;

class Gamerscore extends Model
{
    protected $table = 'gamerscores';

    protected $fillable = [
        'gamer_id',
        'score',
    ];

    public function gamer()
    {
        $this->belongsTo('DashboardersHeaven\Gamer');
    }
}
