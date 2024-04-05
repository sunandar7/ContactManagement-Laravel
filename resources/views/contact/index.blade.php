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
    <div class="col-xl-6 text-end">
        <a href="{{ route('logout') }}" class="text-danger text-decoration-none"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>
</div>
<div class="row justify-content-end mb-3">
    <div class="col-3">
        <input type="text" id="search" class="form-control form-control-sm" placeholder="Search...">
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="card-title">All Contacts</h5>
        <a href="{{ route('contact.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="contact_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td>
                            <form action="{{ route('contact.delete', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn view-btn" data-href="{{ route('contact.show', $contact->id) }}">
                                    <i class="fa-regular fa-eye text-info"></i>
                                </button>
                                <a href="{{route('contact.edit', $contact->id)}}"><i class="fa-regular fa-pen-to-square text-primary"></i></a>
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn"><i class="fa-regular fa-trash-can text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="text-danger text-center">No contacts found!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="contact_detail_modal">
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection