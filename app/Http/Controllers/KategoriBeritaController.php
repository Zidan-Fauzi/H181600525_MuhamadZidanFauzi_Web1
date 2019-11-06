<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriBerita;
class KategoriBeritaController extends Controller
{
    //
    public function index(){
        //eloquent => orm(objek relasional maping)
        $listKategoriBerita=KategoriBerita::all(); //select kategori from artikel

        return view('kategori_berita.index',compact('listKategoriBerita'));
    }

    public function show($id){
        //eloquent

        $KategoriBerita=KategoriBerita::where('id',$id)->first(); //select=from kategori_berita where id=$id limit 1


        return view('kategori_berita.show',compact('KategoriBerita'));
    }

    public function create(){
        return view('kategori_berita.create');
    }

    public function store(Request $request){
        $input= $request->all();

        KategoriBerita::create([
            'nama'=>$input['nama'],
            'users_id'=>$input['users_id']
        ]);

        return redirect(route('kategori_berita.index'));
    }
    public function edit($id){
        $KategoriBerita=KategoriBerita::find($id);

        if(empty($KategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }

        return view('kategori_berita.edit',compact('KategoriBerita'));
    }

    public function update($id,Request $request){
        $KategoriBerita=KategoriBerita::find($id);
        $input= $request->all();

        if(empty($KategoriBerita)){
            return redirect(route('kategori_berita.index'));
        }
        $KategoriBerita->update($input);

        return redirect(route('kategori_berita.index'));
    }

    public function destroy($id){
        $KategoriBerita=KategoriBerita::find($id);

        if(empty($KategoriBerita)){
            return redirect(route('kategori_berita.index'));

        }
    $KategoriBerita->delete();

        return redirect(route('kategori_berita.index'));
    }

    public function trash(){
        //eloquent => orm(objek relasional maping)
        $listKategoriBerita=KategoriBerita::onlyTrashed(); //select kategori from artikel

        return view('kategori_berita.index',compact('listKategoriBerita'));
    }

}
