@extends('_layout/admin/app')

@section('title')
    Data Pengguna
@endsection

@section('content')
    <div class="page-title mb-5">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pengguna</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Pengguna
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header ms-auto">
                <a href="{{ url("$rootLink/add") }}" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                @if (empty($users))
                    <div class="my-5 text-center">
                        <h5>Data Belum Tersedia</h5>
                        <p>Silahkan melakukan penambahan data</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 ">
                            <thead>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <label class="badge bg-secondary">{{ $user->access_type }}</label>
                                        </td>
                                        <td>
                                            <a href="{{ url("$rootLink/update/$user->id") }}"
                                                class="btn btn-sm btn-warning mb-md-0 mb-2">Edit</a>
                                            <a href="{{ url("$rootLink/do-delete/$user->id") }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
