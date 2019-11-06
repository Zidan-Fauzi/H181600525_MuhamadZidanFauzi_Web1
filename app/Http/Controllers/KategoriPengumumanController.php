<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPengumuman;
class KategoriPengumumanController extends Controller
{
    //
    public function index(){
        //eloquent => orm(objek relasional maping)
        $listKategoriPengumuman=KategoriPengumuman::all(); //select kategori from artikel

        return view('kategori_pengumuman.index',compact('listKategoriPengumuman'));
    }

    public function show($id){
        //eloquent

        $KategoriPengumuman=KategoriPengumuman::where('id',$id)->first(); //select=from kategori_berita where id=$id limit 1


        return view('kategori_pengumuman.show',compact('KategoriPengumuman'));
    }

    public function create(){
        return view('kategori_pengumuman.create');
    }

    public function store(Request $request){
        $input= $request->all();

        KategoriPengumuman::create([
            'nama'=>$input['nama'],
            'users_id'=>$input['users_id']
        ]);

        return redirect(route('kategori_pengumuman.index'));
    }
    public function edit($id){
        $KategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($KategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }

        return view('kategori_pengumuman.edit',compact('KategoriPengumuman'));
    }

    public function update($id,Request $request){
        $KategoriPengumuman=KategoriPengumuman::find($id);
        $input= $request->all();

        if(empty($KategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));
        }
        $KategoriPengumuman->update($input);

        return redirect(route('kategori_pengumuman.index'));
    }

    public function destroy($id){
        $KategoriPengumuman=KategoriPengumuman::find($id);

        if(empty($KategoriPengumuman)){
            return redirect(route('kategori_pengumuman.index'));

        }
    $KategoriPengumuman->delete();

        return redirect(route('kategori_pengumuman.index'));
    }

    public function trash(){
        //eloquent => orm(objek relasional maping)
        $listKategoriPengumuman=KategoriPengumuman::onlyTrashed(); //select kategori from artikel

        return view('kategori_pengumuman.index',compact('listKategoriPengumuman'));
    }


}
