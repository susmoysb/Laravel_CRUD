@extends('layout.master')

@section('title', 'Edit User')

@section('content')

    <div class="container-lg col-lg-6 user_create px-4">

        {{-- <a href="{{ route('user.index') }}" class="btn btn-sm btn-success my-3">View Users List</a> --}}

        <div class="form-header text-center mb-4 mt-2 pt-2">
            <h1>Edit User</h1>
        </div>

        @if (Session::get('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <b>{{ Session::get('success_message') }}</b>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-success float-end">View Users List</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('user.update', $user->id) }}" autocomplete="off">

            @csrf
            @method('patch')
            
            <div class="row mb-3">
                <label for="first_name" class="col-md-3 col-form-label col-form-label-sm">First Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" id="first_name" placeholder="Enter Your First Name"  name="first_name" value="{{ $user->first_name }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="last_name" class="col-md-3 col-form-label col-form-label-sm">Last Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" id="last_name" placeholder="Enter Your Last Name"  name="last_name" value="{{ $user->last_name }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-3 col-form-label col-form-label-sm">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" placeholder="Enter Your Email"  name="email" value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="phone" class="col-md-3 col-form-label col-form-label-sm">Phone</label>
                <div class="col-md-9">
                    <input type="number" class="form-control form-control-sm @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Your Phone Number"  name="phone" value="{{ $user->phone }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="username" class="col-md-3 col-form-label col-form-label-sm">Username</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" placeholder="Enter Your Username"  name="username" value="{{ $user->username }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-1">
                <label for="gender" class="col-md-3 col-form-label col-form-label-sm">Gender</label>
                <div class="col-md-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="Male" @if ($user->gender == "Male") checked @endif>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="Female" @if ($user->gender == "Female") checked @endif>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="others" value="Others" @if ($user->gender == "Others") checked @endif>
                        <label class="form-check-label" for="others">Others</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birth" class="col-md-3 col-form-label col-form-label-sm">Date of Birth</label>
                <div class="col-md-9">
                    {{-- <input type="date" class="form-control form-control-sm @error('date_of_birth') is-invalid @enderror" id="date_of_birth"  name="date_of_birth" value="{{ date('Y-m-d',strtotime($user->date_of_birth)) }}"> --}}
                    <input type="date" class="form-control form-control-sm @error('date_of_birth') is-invalid @enderror" id="date_of_birth"  name="date_of_birth" value="{{ $user->date_of_birth->format('Y-m-d') }}">
                    @error('date_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="country_id" class="col-md-3 col-form-label col-form-label-sm">Country</label>
                <div class="col-md-9">
                    <select class="form-select form-select-sm @error('country_id') is-invalid @enderror" id="country_id" name="country_id" >
                        <option value="">Please Select Your Country</option>
                        <option @if ($user->country_id == "Bangladesh") selected @endif value="Bangladesh">Bangladesh</option>
                        <option @if ($user->country_id == "India") selected @endif value="India">India</option>
                        <option @if ($user->country_id == "Nepal") selected @endif value="Nepal">Nepal</option>
                        <option @if ($user->country_id == "China") selected @endif value="China">China</option>
                        <option @if ($user->country_id == "Bhutan") selected @endif value="Bhutan">Bhutan</option>
                        <option @if ($user->country_id == "Pakistan") selected @endif value="Pakistan">Pakistan</option>
                    </select>
                    @error('country_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>

            <div class="row mb-3">
                {{-- <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><b></b></label> --}}
                <div class="col-sm-9 offset-md-3 mb-3">
                    <button type="submit" class="btn btn-primary btn-sm mb-1">Update User</button>
                    <button type="reset" class="btn btn-danger btn-sm mb-1">Reset</button>
                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-success mb-1">View Users List</a>
                </div>
            </div>
        </form>

    </div>
@endsection
