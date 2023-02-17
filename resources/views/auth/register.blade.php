@extends('_layout/auth/app')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <h3>MazerApp</h3>
                </div>
                <h1 class="auth-title">Login Page</h1>
                <p class="auth-subtitle mb-5">
                </p>

                {{-- Alert ketika success dan error --}}
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-warning">
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif

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

                <form action="{{ url('auth/do-register') }}" method="POST">
                    @csrf

                    <div class="form-group position-relative mb-4">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" class="form-control form-control-xl" name="email" />
                    </div>
                    <div class="form-group position-relative mb-4">
                        <label for="name" class="mb-2">Nama</label>
                        <input type="text" class="form-control form-control-xl" name="name" id="name" />
                    </div>
                    <div class="form-group position-relative mb-4">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" class="form-control form-control-xl" name="password" id="password" />
                    </div>
                    <div class="form-group position-relative mb-4">
                        <label for="reenter_password" class="mb-2">Ulangi Password</label>
                        <input type="password" class="form-control form-control-xl" name="reenter_password" id="reenter_password" />
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3 text-space-3" type="submit">
                        <B>DAFTAR</B>
                    </button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Sudah punya akun?
                        <a href="{{ url("login") }}" class="font-bold">Login Sekarang</a>.
                    </p>
                    {{-- <p>
                        <a class="font-bold" href="">Lupa Password</a>.
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
@endsection
