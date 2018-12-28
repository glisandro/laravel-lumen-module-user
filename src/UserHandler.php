<?php

namespace Glisandro\ModuleUser;

use Glisandro\ModuleUser\Validation\Laravel;

class UserHandler
{
    protected $data = null;

    /**
     * @param $user
     * @return mixed
     * @throws \Exception
     */
    public function store($user)
    {
        if ($this->data === null){
            throw new \Exception('No data to store');
        }

        $user->firstName = $this->data['firstName'];
        $user->lastName = $this->data['lastName'];
        $user->email = $this->data['email'];
        $user->phoneNumber = $this->data['phoneNumber'];

        return $user->save();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function validate($request)
    {
        $class = "Glisandro\\ModuleUser\\Validation\\".ucfirst(env('framework'));
        
        $data = $class::validate($request);

        if($data){
            $this->data = $data;
            return true;
        }

        return false;
    }
}
