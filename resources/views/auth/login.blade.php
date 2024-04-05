@extends('master')
@section('content')
    <div class="row my-5">
        <div class="col-xl-6 mb-3">
            @if(session('success'))
            <div class="toast text-bg-success position-fixed top-3 start-3" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" style="z-index: 100;">
                <div class="toast-body">
                    <i class="fa-regular fa-circle-check"></i> {{ session('success') }}
                </div>
            </div>
            @elseif(session('error'))
            <div class="toast text-bg-danger position-fixed top-3 start-3" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" style="z-index: 100;">
                <div class="toast-body">
                    <i class="fa-regular fa-circle-xmark"></i> {{ session('error') }}
                </div>
            </div>
            @endif
        </div>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Username <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Username">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-2">
        <div class="col-xl-6 m-auto">
            <p class="m-auto">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection