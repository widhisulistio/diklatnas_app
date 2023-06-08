<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelmhs extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'mahasiswa';
    protected $primaryKey ='id';
    public $timestamps = true;

//    protected $fillable = [
//        'nim',
//        'namamhs',
//        'tlpmhs',
//        'alamatmhs',
//        'institusimhs'
//    ];


}
