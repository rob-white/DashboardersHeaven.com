<?php namespace DashboardersHeaven;

use Illuminate\Database\Eloquent\Model;

/**
 * DashboardersHeaven\Gamer
 *
 * @property integer                                                                        $id
 * @property integer                                                                        $xuid
 * @property string                                                                         $gamertag
 * @property integer                                                                        $gamerscore
 * @property string                                                                         $gamerpic_small
 * @property string                                                                         $gamerpic_large
 * @property string                                                                         $display_pic
 * @property string                                                                         $motto
 * @property string                                                                         $bio
 * @property mixed                                                                          $avatar_manifest
 * @property integer                                                                        $level
 * @property \Carbon\Carbon                                                                 $created_at
 * @property \Carbon\Carbon                                                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\DashboardersHeaven\Gamerscore[] $gamerscores
 * @property-read \Illuminate\Database\Eloquent\Collection|\DashboardersHeaven\Game[]       $games
 * @property-read \Illuminate\Database\Eloquent\Collection|\DashboardersHeaven\Clip[]       $clips
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereXuid($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereGamertag($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereGamerscore($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereGamerpicSmall($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereGamerpicLarge($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereDisplayPic($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereMotto($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereBio($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereAvatarManifest($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\DashboardersHeaven\Gamer whereUpdatedAt($value)
 */
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
        'motto',
        'avatar_manifest',
        'level'
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
     * Get all the gamers clips
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clips()
    {
        return $this->hasMany('DashboardersHeaven\Clip', 'xuid', 'xuid');
    }

    /**
     * {@inheritdoc}
     */
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        return new GamesGamersPivot($parent, $attributes, $table, $exists);
    }
}
