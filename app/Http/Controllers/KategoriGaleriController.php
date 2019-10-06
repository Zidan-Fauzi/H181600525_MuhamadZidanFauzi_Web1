<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriGaleri;
class KategoriGaleriController extends Controller
{
    //
    public function index(){
        //eloquent => orm(objek relasional maping)
        $listKategoriGaleri=KategoriGaleri::all(); //select kategori from artikel

        return view('kategori_galeri.index',compact('listKategoriGaleri'));
    }

    public function show($id){
        //eloquent

        $KategoriGaleri=KategoriGaleri::where('id',$id)->first(); //select=from kategori_berita where id=$id limit 1


        return view('kategori_galeri.show',compact('KategoriGaleri'));
    }

    public function create(){
        return view('kategori_galeri.create');
    }

    public function store(Request $request){
        $input= $request->all();

        KategoriGaleri::create([
            'nama'=>$input['nama'],
            'users_id'=>$input['users_id']
        ]);

        return redirect(route('kategori_galeri.index'));
    }
}
