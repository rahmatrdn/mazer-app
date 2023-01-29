@extends('_layout/admin/app')

@section('title')
    Edit Data Pengguna
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
                        <li class="breadcrumb-item">
                            <a href="{{ url($rootLink) }}">Data Pengguna</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Data</h5>
                    </div>
                    <div class="card-body">
                        <!-- Menampilkan Error form validation -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <b>Terjadi kesalahan pada proses input data</b> <br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url("$rootLink/do-update/$user->id") }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="access_type" class="form-label">Hak Akses</label>
                                <select name="access_type" id="access_type" class="form-select">
                                    <option value="">- Pilih Hak Akses -</option>

                                    <option value="ADMIN" {{ $user->access_type == 'ADMIN' ? "selected" : "" }}>Admin</option>
                                    <option value="MEMBER" {{ $user->access_type == 'MEMBER' ? "selected" : "" }}>Member</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
