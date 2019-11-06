<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class pengumuman extends Model
{
    protected $table='pengumuman';
    protected $fillable=[
        'judul','isi','users_id','kategori_pengumuman_id'
    ];

    protected $casts=[

    ];

    protected $casts=[
        'deleted_at'=>'datetime'
    ];

}
