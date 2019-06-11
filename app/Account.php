<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $connection = "radius";
    protected $table = "radcheck";
    public $timestamps = false;

    public $fillable = [
        "username",
        "attribute",
        "op",
        "value",
    ];

    const DEFAULT_ATTRIBUTE = "Cleartext-Password";
    const DEFAULT_OP = ":=";
}
