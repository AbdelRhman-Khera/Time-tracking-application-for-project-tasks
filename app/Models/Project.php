<?php

namespace App\Models;

use Eloquent as Model;

class Project extends Model
{


    public $table = 'projects';


    public $fillable = [
        'name',
        'description',
        'from',
        'to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'from' => 'date',
        'to' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'from' => 'required',
        'to' => 'required'
    ];

   /**
    * Get all of the comments for the Project
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function times()
   {
       return $this->hasMany(Track::class, 'project_id', 'id')->orderByDesc('created_at');
   }

}
