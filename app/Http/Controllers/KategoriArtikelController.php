<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\KategoriArtikel;
class KategoriArtikelController extends Controller
{
    //
    public function index(){
        //eloquent => orm(objek relasional maping)
        $listKategoriArtikel=KategoriArtikel::all(); //select kategori from artikel

        return view(view,'kategori_artikel.index',compact('listKategoriArtikel'));
    }
}
