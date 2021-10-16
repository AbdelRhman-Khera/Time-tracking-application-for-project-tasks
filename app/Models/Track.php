<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Track
 * @package App\Models
 * @version October 13, 2021, 1:56 pm UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Project $project
 * @property string $project_id
 * @property integer $time
 * @property integer $user_id
 * @property string $comment
 */
class Track extends Model
{


    public $table = 'tracks';




    public $fillable = [
        'project_id',
        'time',
        'user_id',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'project_id' => 'string',
        'time' => 'string',
        'user_id' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'project_id' => 'required',
        'time' => 'required',
        'user_id' => 'required',
        'comment' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id', 'id');
    }
}
