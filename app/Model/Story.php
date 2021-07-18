<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    protected $guarded = [];
    protected $table ='Story';

//    protected $with = ['lesions'];

    protected $hidden = [ 'created_at', 'updated_at'];


}
