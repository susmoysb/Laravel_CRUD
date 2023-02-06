@extends('layout.master')

@section('title', 'User Details')

@section('content')
    
    <div class="container-lg mt-3">

        <div class="row justify-content-center align-items-center">
            <div class="col-md-2 text-center">
                <img style="width: 160px; height: 200px" class="mb-2" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" alt="">
                
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-success" title="Edit">Edit</i></a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-flex">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this user?')">Delete</i></button>
                    {{-- <a href="" class="btn_delete" title="Delete"><i class="fa-solid fa-trash"></i></a> --}}
                </form>
            </div>
            <div class="col-md-4">
                
                <div class="row row-cols-2">
                    <div class="col-5 border border-success">First Name</div>
                    <div class="col-7 border border-success"><b>{{ $user->first_name }}</b></div>
                    
                    <div class="col-5 border border-success">Last Name</div>
                    <div class="col-7 border border-success"><b>{{ $user->last_name }}</b></div>

                    <div class="col-5 border border-success">Email</div>
                    <div class="col-7 border border-success"><b>{{ $user->email }}</b></div>

                    <div class="col-5 border border-success">Phone</div>
                    <div class="col-7 border border-success"><b>{{ $user->phone }}</b></div>

                    <div class="col-5 border border-success">Username</div>
                    <div class="col-7 border border-success"><b>{{ $user->username }}</b></div>

                    <div class="col-5 border border-success">Gender</div>
                    <div class="col-7 border border-success"><b>{{ $user->gender }}</b></div>

                    <div class="col-5 border border-success">Date of Birth</div>
                    <div class="col-7 border border-success"><b>{{ $user->date_of_birth->diffForHumans() }}</b></div>

                    <div class="col-5 border border-success">Country</div>
                    <div class="col-7 border border-success"><b>{{ $user->country_id }}</b></div>

                    <div class="col-5 border border-success">Created At</div>
                    <div class="col-7 border border-success"><b>{{ $user->created_at->diffForHumans() }}</b></div>

                    <div class="col-5 border border-success">Updated At</div>
                    <div class="col-7 border border-success"><b>{{ $user->updated_at->diffForHumans() }}</b></div>
                </div>

            </div>
        </div>

    </div>
    
@endsection