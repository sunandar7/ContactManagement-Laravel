@extends('master')
@section('content')
    <div class="row my-5">
        <div class="col-12">
            <a href="{{ route('contact.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-chevron-left"></i> Back</a>
        </div>
    </div>
    <form action="{{ route('contact.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row my-5">
            <div class="col-xl-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Contact</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$contact->name) }}" placeholder="Name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email',$contact->email) }}" placeholder="Email">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number',$contact->phone_number) }}" placeholder="Phone Number">
                            @error('phone_number')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection