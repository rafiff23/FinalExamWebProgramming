@extends('layouts.index', ['title' => 'profile'])

@section('content')
    <div class="container mt-4 d-flex justify-content-center align-items-center col-md-10" style="margin-bottom: 4rem">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('profile') }}</h6>
            </div>
            <div class="card-body ">
                <div class=" mt-auto d-flex flex-md-row flex-sm-column justify-content-center align-items-center">
                    <div class="cropper mr-4"
                        style="width: 200px;
                    height: 200px;
                    position: relative;
                    overflow: hidden;
                    border-radius: 50%;">
                        <img src="{{ asset('storage/' . $user->display_picture_link) }}" alt="image profile"
                            style="display: inline;
                            margin: 0 auto;
                            height: 100%;
                            width: auto;">
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="row g-2 needs-validation col-md-8" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">{{ __('first_name') }}</label>
                            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                                class="form-control @error('first_name') is-invalid @enderror" id="validationCustom01"
                                required>
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">{{ __('last_name') }}</label>
                            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                                class="form-control @error('last_name') is-invalid @enderror" id="validationCustom02"
                                required>
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="form-control @error('email') is-invalid @enderror" id="validationCustom02" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">{{ __('role') }}</label>
                            <input type="text" class="form-control" readonly value="{{ $user->role->role_name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">{{ __('gender') }}</label>
                            <div class="">
                                <div class="form-check-inline">
                                    <input class="form-check-input" name="gender_id" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{ __('male') }}
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" name="gender_id" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        {{ __('female') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">{{ __('display_picture') }}</label>
                            <img class="img-preview img-fluid mb-3" id="img-preview">
                            <input type="hidden" name="oldImage" value="{{ $user->display_picture_link }}">
                            <input class="form-control @error('display_picture_link') is-invalid @enderror" type="file"
                                id="image" name="display_picture_link" >
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">{{ __('password') }}</label>
                            <input type="password" name="password" value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid @enderror"
                                id="validationCustom01"required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">{{ __('confirm_password') }}</label>
                            <input type="password" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror" id="validationCustom02"
                                required>
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit"><i
                                    class="fas fa-regular fa-pen-to-square"></i>
                                {{ __('edit_profile') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
