<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table='artikel';
    protected $fillable=[
        'judul','isi','users_id','kategori_berita_id'
    ];

    protected $casts=[

    ];
}

