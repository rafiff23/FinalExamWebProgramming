@extends('layouts.index', ['title' => 'admin'])

@section('content')
    <div class="conainer mt-4" style=" margin-bottom: 6rem">
        @if (session()->has('success'))
            <div class="alert alert-success ml-auto mr-auto col-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container col-md-6 ml-auto mr-auto ">

            <div class="card shadow mb-4 ">
                <div class="card-header pt-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('data_account') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table table-bordered dataTable ml-auto mr-auto">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">{{ __('account') }}</th>
                                    <th scope="col">{{ __('action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->first_name . ' ' . $user->last_name }} - {{ $user->role->role_name }}
                                        </td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div>
                                                    <a class=" btn btn-warning btn-sm"
                                                        href="../../{{ app()->getLocale() }}/admin/{{ $user->account_id }}/edit">{{ __('update_role') }}
                                                    </a>
                                                </div>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#cancelModal">{{ __('delete') }}
                                                </button>
                                                <form
                                                    action="../../{{ app()->getLocale() }}/admin/{{ $user->account_id }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog"
                                                        aria-labelledby="cancelModalTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ __('delete_user') }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ __('delete_user_message') }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('close') }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{ __('delete') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
