@extends('layouts.app')

@section('content')
<div class ="background-image back">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
<<<<<<< HEAD
                        <a href="{{ route('report') }}" class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded p-4 !bg-blue-500" style="background-color: #3b82f6 !important;">Return</a>
=======
                        <a href="http://127.0.0.1:8080" class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded !bg-blue-500" style="background-color: #3b82f6 !important;">Return</a>
>>>>>>> 6139b60b6beb160e56f8b6fe7b592835729326d8
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
