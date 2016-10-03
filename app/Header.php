<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'contacts';
    public $timestamps = false;


    const PATH_TO_DIR_SITE = '/template/images/site/';
}
