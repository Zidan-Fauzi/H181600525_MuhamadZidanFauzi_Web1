<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;
class KategoriArtikelController extends Controller
{
    public function index(){
        //eloquent => orm(objek relasional maping)
        $listKategoriArtikel=KategoriArtikel::all(); //select kategori from artikel

        return view('kategori_artikel.index',compact('listKategoriArtikel'));
    }

    public function show($id){
        //eloquent

        $KategoriArtikel=KategoriArtikel::where('id',$id)->first(); //select=from kategori_artikel where id=$id limit 1


        return view('kategori_artikel.show',compact('KategoriArtikel'));
    }

    public function create(){
        return view('kategori_artikel.create');
    }

    public function store(Request $request){
        $input= $request->all();

        KategoriArtikel::create([
            'nama'=>$input['nama'],
            'users_id'=>$input['users_id']
        ]);

        return redirect(route('kategori_artikel.index'));
    }
}
