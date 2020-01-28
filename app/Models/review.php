<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use PresentableTrait;
    protected $presenter = UserPresenter::class;

    protected $fillable = [
        'name'
    ];

    // protected $hidden = [
    // ];
}
