<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;
use DB;
use Mockery\Exception;
class GaleriController extends Controller
{
 
    public function index(){
        $listGaleri=Galeri::all();
           return view('galeri.index',compact('listGaleri'));
   
  
       }
   
       
       public function show($id){
   
           $galeri=galeri::find($id);
        
           return view('galeri.show', compact ('galeri'));
       }
       public function create(){
           $KategoriGaleri = KategoriGaleri::pluck('nama','id');
          
           return view('galeri.create', compact('KategoriGaleri'));
       }
       
       public function store(Request $request){
           try{
            DB::beginTransaction();
            $input=$request->except('path');
   
            $galeri=galeri::create($input);
   
            if($request->has('path')){
                $file=$request->file('path');
                $filename=$galeri->id.'.'.$file->getClientOriginalExtension();
                $path=$request->path->storeAs('public/galeri',$filename,'local');
                $galeri->path="storage".substr($path,strpos($path,'/'));
                $galeri->save();
            }
            DB::commit();
           }catch(Exception $e){
            DB::rollBack();
           }
           

           return redirect(route('galeri.index'));
       }

       public function edit($id){
        $Galeri=Galeri::find($id);
        $KategoriGaleri = KategoriGaleri::pluck('nama','id');
        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }

        return view('galeri.edit',compact('Galeri','KategoriGaleri'));
    }

    public function update($id,Request $request){
        $Galeri=Galeri::find($id);
        $input= $request->all();

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }
        $Galeri->update($input);

        return redirect(route('galeri.index'));
    }

    public function destroy($id){
        $Galeri=Galeri::find($id);

        if(empty($Galeri)){
            return redirect(route('galeri.index'));

        }
    $Galeri->delete();

        return redirect(route('galeri.index'));
    }

    public function trash(){
        //eloquent => orm(objek relasional maping)
        $listGaleri=Galeri::onlyTrashed(); //select kategori from artikel

        return view('galeri.index',compact('listGaleri'));
    }

}
