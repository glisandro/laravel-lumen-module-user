<?php

namespace Glisandro\ModuleUser;

class UserHandler
{

    protected $data = null;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user)
    {
        if ($this->data === null){
            throw Exception('No data to store');
        }

        $user->firstName = $this->data['firstName'];
        $user->lastName = $this->data['lastName'];
        $user->email = $this->data['email'];
        $user->phoneNumber = $this->data['phoneNumber'];
        return $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validate($request)
    {
        $this->data = $request->validate([
            'firstName' => 'required|min:3|max:50',
            'lastName' => 'required|min:3|max:50',
            'email' => 'required|unique:users',
            'phoneNumber' => 'nullable|numeric'
        ]);
    }
}
