<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $table = 'clients';
    use HasFactory;


    //
    public static function listPackages(){
        $all_packages = Package::all();
        return $all_packages;
    }
}
