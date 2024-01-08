<?php

namespace Cosanpa\App\models;

class User
{
    public readonly int $id;
    public readonly string $name;
    public readonly ?string $firstname;
    public ?string $phone;
    public readonly ?string $realname;
    public readonly ?string $user_dn;
}
