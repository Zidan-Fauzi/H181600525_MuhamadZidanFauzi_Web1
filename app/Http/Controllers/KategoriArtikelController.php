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

    public function show($id){
        //eloquent

        $KategoriArtikel=KategoriArtikel::where('id',$id)->first(); //select=from kategori_artikel where id=$id limit 1


        return view(view,'kategori_artikel.show',compact('KategoriArtikel'));
    }

}
