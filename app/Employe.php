<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employe extends Model
{

    use SoftDeletes;

    protected $guarded =[];

    public function getRouteKeyName()
    {
        return 'dni';
    }

    // public function position()
    // {
    //     return $this->belongsTo(Position::class);
    // }
}
