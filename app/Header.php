<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'contacts';
    public $timestamps = false;


    const PATH_TO_DIR_SITE = '/template/images/site/';

    public static $rules = [
        'phone1' => 'required|integer',
        'phone2' => 'required|integer',
        'address' => 'required|min:10',
        'logotype' => 'image',
        'favicon' => 'image'
    ];

    public static function saveHeader($phone1,$phone2,$address,$logotype,$favicon)
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $header = self::find(1);
        $header->phone1 = $phone1;
        $header->phone2 = $phone2;
        $header->address = $address;
        if ($logotype) {
            $file = $logotype;
            $logotypeName = $file->getClientOriginalName();
            $file->move($root . Header::PATH_TO_DIR_SITE, $logotypeName);
            $header->logotype = Header::PATH_TO_DIR_SITE . $logotypeName;
        }
        if ($favicon) {
            $file = $favicon;
            $faviconName = $file->getClientOriginalName();
            $file->move($root . Header::PATH_TO_DIR_SITE, $faviconName);
            $header->favicon = Header::PATH_TO_DIR_SITE . $faviconName;
        }
        $header->save();
    }

}
