<!DOCTYPE html>

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori artikel</div>

                <div class="card-body">
                <table border="1">
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Users</td>
            <td>create</td>
        </tr>

    @foreach($listKategoriArtikel as item)    
         <tr>
            <td>{!! $item->id !!}</td>
            <td>{!! $item->nama !!}</td>
            <td>{!! $item->users_id !!</td>
            <td>{!! $item->created_ad->format('d/M/Y H:i:s')!!</td>
        </tr>   

        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<html>
<head>
    <title>Kategori Artikel</title>
</head>
<body>
    
    </table>
</body>
</html>