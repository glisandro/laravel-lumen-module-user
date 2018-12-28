<?php

namespace Glisandro\ModuleUser\Validation;

use Validator;

class Lumen
{
    public static function validate($request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|min:3|max:50',
            'lastName' => 'required|min:3|max:50',
            'email' => 'required|unique:users',
            'phoneNumber' => 'nullable|numeric'
        ]);

        if(!$validator->fails()){
            return $validator->getData();
        }
    }
}