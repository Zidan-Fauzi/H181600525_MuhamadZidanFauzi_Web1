<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;
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
           $input=$request->all();
   
           galeri::create($input);
   
           return redirect(route('galeri.index'));
       }
}
