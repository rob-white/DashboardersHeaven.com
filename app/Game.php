<?php namespace DashboardersHeaven;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'user_id',
        'title_id',
        'title',
        'earned_achievements',
        'current_gamerscore',
        'max_gamerscore',
        'last_unlock'
    ];

    public function gamers()
    {
        return $this->belongsToMany('DashboardersHeaven\Gamer');
    }
}
