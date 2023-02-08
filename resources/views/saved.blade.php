@extends('layouts.index',['title' => 'saved'])

@section('content')
    <div class="container col-md-4" style=" height: 80vh; post">
        <div class="card shadow mb-4 " style="margin-bottom: 4rem; margin-top: 4rem;">
            <div class="card-body py-3 ">
              <div class="d-flex" style="flex-direction: column;justify-content: center;text-align: center">
                <h1 class="h1 m-0 font-weight-bold text-primary mb-4">{{ __('success') }}!</h1>
                <i class="fas fa-check-circle text-success mb-4" style="font-size: 100px"></i>
                <a href="../../{{ app()->getLocale() }}/home">{{ __('back_to_home') }}</a>
              </div>
            </div>
        </div>
    </div>
@endsection
