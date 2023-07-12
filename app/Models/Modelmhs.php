<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class Modelmhs extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'mahasiswa';
    protected $primaryKey ='id';
    public $timestamps = true;

    public $sortable =[
        'nim','namamhs','jk','tlpmhs','alamatmhs','institusimhs','jurusanmhs','jenjangmhs',
    ];


//    protected $fillable = [
//        'nim',
//        'namamhs',
//        'tlpmhs',
//        'alamatmhs',
//        'institusimhs'
//    ];


}
