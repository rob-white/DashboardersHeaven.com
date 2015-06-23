<?php namespace DashboardersHeaven;

use Illuminate\Database\Eloquent\Model;

class Gamer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gamers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'xuid',
        'gamertag',
        'gamerscore',
        'gamerpic_small',
        'gamerpic_large',
        'display_pic',
        'bio',
        'avatar_manifest'
    ];

    /**
     * Get all gamerscores for a gamer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gamerscores()
    {
        return $this->hasMany('DashboardersHeaven\Gamerscore');
    }

    /**
     * Get all games for a gamer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function games()
    {
        return $this->belongsToMany('DashboardersHeaven\Game')
                    ->withPivot([
                        'earned_achievements',
                        'current_gamerscore',
                        'max_gamerscore',
                        'last_unlock'
                    ])
                    ->withTimestamps();
    }

    /**
     * {@inheritdoc}
     */
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        return new GamesGamersPivot($parent, $attributes, $table, $exists);
    }
}
