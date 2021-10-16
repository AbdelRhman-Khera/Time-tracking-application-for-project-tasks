<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version October 13, 2021, 11:56 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'role',
        'email',
        'password'
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
    public function createuser(Request $request)
    {

        $input = $request->all();

        $input['password'] = Hash::make($request->password);

        return $this->create($input);
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();

        if (!is_null($request->password)) {
            $input['password'] = Hash::make($request->password);
        }else{
            $input['password'] =$user->password;
        }

        return $this->update($input, $id);
    }

    public function model()
    {
        return User::class;
    }
}
