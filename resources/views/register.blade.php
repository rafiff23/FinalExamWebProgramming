@extends('layouts.index', ['title' => 'register'])

@section('content')
    <div class="container mt-4 d-flex justify-content-center align-items-center col-md-8" style="margin-bottom: 4rem">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('register') }}</h6>
            </div>
            <div class="card-body ">

                <form class="row g-2 needs-validation" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">{{ __('first_name') }}</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="validationCustom01">
                        @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">{{ __('last_name') }}</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="validationCustom02">
                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="validationCustom02">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">{{ __('role') }}</label>
                        <select class="form-select" name="role_id" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
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
                        <input class="form-control @error('display_picture_link') is-invalid @enderror" type="file"
                            id="image" name="display_picture_link">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">{{ __('password') }}</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror"
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
                    <div class="col">
                        <a href="../../{{ app()->getLocale() }}/login">{{ __('register_link') }}</a>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit"> {{ __('register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
