<?php

namespace Glisandro\ModuleUser;

use Validator;

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
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|min:3|max:50',
            'lastName' => 'required|min:3|max:50',
            'email' => 'required|unique:users',
            'phoneNumber' => 'nullable|numeric'
        ]);

        if ($validator->fails()) {
            return false;
        }

        $this->data = $validator->getData();

        return true;
    }
}
