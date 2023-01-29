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

                <form action="{{ url('auth/do-login') }}" method="POST">
                    @csrf

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Username" name="email" />

                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" />

                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3 text-space-3" type="submit">
                        <B>MASUK</B>
                    </button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Belum punya akun?
                        <a href="" class="font-bold">Daftar Sekarang</a>.
                    </p>
                    <p>
                        <a class="font-bold" href="">Lupa Password</a>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
@endsection
