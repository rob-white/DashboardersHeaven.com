<?php namespace DashboardersHeaven;

use Illuminate\Database\Eloquent\Model;

/**
 * DashboardersHeaven\Game
 *
 * @property integer                                                                   $id
 * @property integer                                                                   $title_id
 * @property string                                                                    $title
 * @property boolean                                                                   $is_app
 * @property \Carbon\Carbon                                                            $created_at
 * @property \Carbon\Carbon                                                            $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\DashboardersHeaven\Gamer[] $gamers
 * @property-read \Illuminate\Database\Eloquent\Collection|\DashboardersHeaven\Clip[]  $clips
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Game whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Game whereTitleId($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Game whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Game whereUpdatedAt($value)
 */
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
        return $this->belongsToMany('DashboardersHeaven\Gamer')
                    ->withPivot([
                        'earned_achievements',
                        'current_gamerscore',
                        'max_gamerscore',
                        'last_unlock'
                    ])
                    ->withTimestamps();
    }

    /**
     * Get all the clips that recorded in this game
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clips()
    {
        return $this->hasMany('DashboardersHeaven\Clip', 'title_id', 'title_id');
    }

    /**
     * {@inheritdoc}
     */
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        return new GamesGamersPivot($parent, $attributes, $table, $exists);
    }
}
