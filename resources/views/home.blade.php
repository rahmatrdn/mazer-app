@extends('_layout.front.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Welcome to MazerApp</h1>
                    <h4 style="color: #aaaaaa">Sample aplikasi Laravel yang mudah digunakan untuk pemula!</h4>

                    @if (Auth::check() == true)
                        <div class="alert alert-success">
                            <p>Kamu login sebagai</p>
                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                            <small>{{ Auth::user()->access_type }}</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
