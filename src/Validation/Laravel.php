<?php

namespace Glisandro\ModuleUser\Validation;

class Laravel
{
    public static function validate($request)
    {
        return $request->validate([
            'firstName' => 'required|min:3|max:50',
            'lastName' => 'required|min:3|max:50',
            'email' => 'required|unique:users',
            'phoneNumber' => 'nullable|numeric'
        ]);
    }
}