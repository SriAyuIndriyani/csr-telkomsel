@extends('admin.template.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Daftar Pengguna</h1>
    <a class="btn btn-primary btn-sm" href="/daftar-pengguna/create">Tambah Data</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body" style="overflow: auto;">
            <div class="table-responsive">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div id="error-alert" class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="table table-sm" border="1">
                    <thead style="color: black;background-color: #cccccc">
                        <tr>
                            <th>Nama Pengguna</th>
                            <th>E-Mail</th>
                            <th>Password</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($join as $item)
                        <tr>
                            <td style="color: black;">{{$item->name}}</td>
                            <td style="color: black;">{{$item->email}}</td>
                            <td style="color: black;">{{$item->password}}</td>
                            <td style="color: black;">{{$item->role}}</td>
                            <td>
                                <a href="/user/{{$item->id}}/update" class="btn btn-success btn-sm rounded-0">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/user/{{$item->id}}/delete" class="btn btn-danger btn-sm rounded-0">
                                    <i class="fa fa-trash" class="btn btn-danger btn-sm rounded-0"></i>
                                </a>
                            </td>
                        </tr>
                            
                        @endforeach
                            
                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection