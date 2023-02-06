@extends('layout.master')

@section('title', 'Users List')

@section('content')
    
    <div class="container-lg table-responsive-lg">
        <a href="{{ route('user.create') }}" class="btn btn-sm btn-success my-3">Add New User</a>
        <table id="table_id" class="display table table-sm table-striped table-hover table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="table-success">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td>{{ $user->country_id }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn_edit" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('delete')
                                <button class="btn_delete" onclick="return confirm('Are you sure to delete this user?')"><i class="fa-solid fa-trash"></i></button>
                                {{-- <a href="" class="btn_delete" title="Delete"><i class="fa-solid fa-trash"></i></a> --}}
                            </form>
                            <a href="{{ route('user.show', $user->id) }}" class="btn_show" title="Details"><i class="fa-solid fa-circle-info"></i></i></a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
@endsection