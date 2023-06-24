@extends('main')

@section('title', 'Objek Wisata')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Objek Wisata</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="btn mt-2">
    <a href="/objek/insertWisata"><button type="button" class="btn btn-sm btn-primary rounded p-2">Tambah Wisata</button></a>
</div>
<div class="card-body">
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Wisata</th>
                <th>Alamat Wisata</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wisatas as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row -> jenis_kategori}}</td>
                    <td>{{$row -> nama_wisata}}</td>
                    <td>{{$row -> alamat_wisata}}</td>
                    <td>{{$row -> harga}}</td>

                    <td class="text-center">
                        <a href="{{url("/objek/editWisata/".$row->wisata_id)}}" class="btn btn-warning">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{url("/objek/delete")}}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{$row->wisata_id}}">
                            <button class="btn btn-danger">
                                <i data-feather="x-circle"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection