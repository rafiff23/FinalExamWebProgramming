@extends('layouts.index', ['title' => 'welcome'])

@section('content')
    <div class="bg-image py-auto justify-content-center"
        style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('https://cdn.britannica.com/17/196817-050-6A15DAC3/vegetables.jpg');
       height: 100vh; align-items: center; text-align: center; display: flex">
       <h1 class="text-white"><b>{{ __('main_title') }}</b></h1>
    </div>
@endsection
