@extends('layouts.index',['title' => 'admin'])

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh; width: 100vw">
        <div class="col-lg-6">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('change_role') }}</h6>
                </div>
                <div class="card-body">
                    <h3>{{ $account->first_name }}</h3>
                    <form action="../../admin/{{ $account->account_id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{ __('role') }}</label>
                            <select class="form-select" name="role_id">
                                @foreach ($roles as $role)
                                    @if ($account->role_id == $role->role_id)
                                        <option value="{{ $role->role_id }}" selected>
                                            {{ $role->role_name }}
                                        </option>
                                    @else
                                        <option value="{{ $role->role_id }}">
                                            {{ $role->role_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center" style="width: 100%">
                            <button type="submit" class="btn btn-success">
                                {{ __('edit_role') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
