<?php

namespace Glisandro\ModuleUser;

trait UserTrait
{
    public function getFullNameAttribute()
    {
        return ucfirst($this->firstName) . " " . ucfirst($this->lastName);
    }

    public function getPhoneAttribute()
    {
        return ($this->phoneNumber) ?? 'No Data';
    }
}

