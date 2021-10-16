<?php

namespace App\Repositories;

use App\Models\Track;
use App\Repositories\BaseRepository;

/**
 * Class TrackRepository
 * @package App\Repositories
 * @version October 13, 2021, 1:56 pm UTC
*/

class TrackRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'time',
        'user_id',
        'comment'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Track::class;
    }
}
