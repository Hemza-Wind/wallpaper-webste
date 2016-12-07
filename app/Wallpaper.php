<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Wallpaper extends Model
{

    /**
     *  An image is owned by a user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $fillable = [
        'name',
        'path',
        'wallpaper'
    ];
    public function user()
    {
        return $this->belongsTo('App/User');
    }

    /**
     *
     * Get the tags associated with a given image.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    protected $table = "Wallpaper";
}
