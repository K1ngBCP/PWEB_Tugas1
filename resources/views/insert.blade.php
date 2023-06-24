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
<form action="/kategori/insert" method="POST">
    @csrf
    <div class="card-body border bg-white rounded">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Kategori</label>
            <input type="jenis kategori" class="form-control col-md-4" id="exampleFormControlInput1" placeholder="Masukan Kategori" name="jenis_kategori">
        </div>
        <button type="submit" class="btn btn-success">Submit Data</button>
    </div>
</form>
@endsection