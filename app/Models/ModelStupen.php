<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class ModelStupen extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'stupen';
    protected $primaryKey ='id';
    public $timestamps = true;

    public $sortable =[
        'id','nomor','sifat','lampiran','yth','hal','nim','kegiatan','judul','tanggal',
    ];



//    protected $fillable = [
//        'nim',
//        'namamhs',
//        'tlpmhs',
//        'alamatmhs',
//        'institusimhs'
//    ];


}
