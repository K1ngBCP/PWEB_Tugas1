@extends('main')

@section('title', 'Insert Data')

@section('breadrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Insert Data Kategori</h1>
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
<form action="/objek/insertWisata" method="POST">
    @csrf
    <div class="card-body border bg-white rounded">
        <div class="mb-3">
            <label for="ctg" class="form-label">Kategori</label>
            <select class="form-control col-md-4 @error('category') is-invalid @enderror" id="ctg" name="jenis_kategori">
                <option selected disabled> --Pilih Kategori-- </option>
                @foreach ($kategori as $row )
                <option value="{{ $row->id }}">{{ $row->jenis_kategori }}</option>
                @endforeach
            </select>
            <label for="exampleFormControlInput1" class="form-label">Nama Wisata</label>
            <input type="jenis kategori" class="form-control col-md-4" id="exampleFormControlInput1" placeholder="Masukan Kategori" name="nama_wisata">
            <label for="exampleFormControlInput1" class="form-label">Alamat Wisata</label>
            <input type="jenis kategori" class="form-control col-md-4" id="exampleFormControlInput1" placeholder="Masukan Kategori" name="alamat_wisata">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="jenis kategori" class="form-control col-md-4" id="exampleFormControlInput1" placeholder="Masukan Kategori" name="harga">
        </div>
        <button type="submit" class="btn btn-success">Submit Data</button>
    </div>
</form>
@endsection