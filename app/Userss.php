<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// api authentication (3)
use Laravel\Passport\HasApiTokens;

class User extends Model
{
    // api authentication (4)
    use HasApiTokens;
    //
}