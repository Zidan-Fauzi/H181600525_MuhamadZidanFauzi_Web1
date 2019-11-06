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

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

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

    public function edit($id){
        $KategoriArtikel=KategoriArtikel::find($id);

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }

        return view('kategori_artikel.edit',compact('KategoriArtikel'));
    }

    public function update($id,Request $request){
        $KategoriArtikel=KategoriArtikel::find($id);
        $input= $request->all();

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));
        }
        $KategoriArtikel->update($input);

        return redirect(route('kategori_artikel.index'));
    }

    public function destroy($id){
        $KategoriArtikel=KategoriArtikel::find($id);

        if(empty($KategoriArtikel)){
            return redirect(route('kategori_artikel.index'));

        }
    $KategoriArtikel->delete();

        return redirect(route('kategori_artikel.index'));
    }

    public function trash(){
        //eloquent => orm(objek relasional maping)
        $listKategoriArtikel=KategoriArtikel::onlyTrashed(); //select kategori from artikel

        return view('kategori_artikel.index',compact('listKategoriArtikel'));
    }

}
