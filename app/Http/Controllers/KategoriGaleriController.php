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
    public function edit($id){
        $KategoriGaleri=KategoriGaleri::find($id);

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }

        return view('kategori_galeri.edit',compact('KategoriGaleri'));
    }

    public function update($id,Request $request){
        $KategoriGaleri=KategoriGaleri::find($id);
        $input= $request->all();

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));
        }
        $KategoriGaleri->update($input);

        return redirect(route('kategori_galeri.index'));
    }

    public function destroy($id){
        $KategoriGaleri=KategoriGaleri::find($id);

        if(empty($KategoriGaleri)){
            return redirect(route('kategori_galeri.index'));

        }
    $KategoriGaleri->delete();

        return redirect(route('kategori_galeri.index'));
    }
    
    public function trash(){
        //eloquent => orm(objek relasional maping)
        $listKategoriGaleri=KategoriGaleri::onlyTrashed(); //select kategori from artikel

        return view('kategori_galeri.index',compact('listKategoriGaleri'));
    }

}
