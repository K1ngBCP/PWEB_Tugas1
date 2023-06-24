@extends('main')

@section('title', 'Kategori')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kategori</h1>
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
    <a href="/kategori/insert"><button type="submit" class="btn btn-sm btn-primary rounded p-2">Tambah Kategori</button></a>
</div>
<div class="card-body">
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $row -> jenis_kategori}}</td>
                    <td class="text-center">
                        <a href="{{url("/kategori/edit/".$row->id)}}" class="btn btn-warning">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="{{url("/kategori/delete")}}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{$row->id}}">
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