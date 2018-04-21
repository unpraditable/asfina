<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SluggableTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('user_id');

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the gallery for pictures.
     *
     * @return array
     */
}