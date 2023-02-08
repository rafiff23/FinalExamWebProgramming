@extends('layouts.index', ['title' => 'login'])

@section('content')
    <div class="container mt-4 d-flex justify-content-center align-items-center col-md-8" style="margin-bottom: 4rem">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('login') }}</h6>
            </div>
            <div class="card-body ">
                <form class="needs-validationd-flex" method="POST" enctype="multipart/form-data"
                    style="flex-direction: column">
                    @csrf
                    <div class="">
                        <label for="validationCustom02" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                            id="validationCustom02" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="validationCustom01" class="form-label">{{ __('password') }}</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                            id="validationCustom01"required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-3 mb-1">
                        <a href="../../{{ app()->getLocale() }}/register">{{ __('login_link') }}</a>
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit"> {{ __('login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection
