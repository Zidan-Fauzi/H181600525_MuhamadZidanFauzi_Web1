<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table='artikel';
    protected $fillable=[
        'judul','isi','kategori_artikel_id','users_id'
    ];

    





}
