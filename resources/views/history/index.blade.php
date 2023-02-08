@extends('layouts.index', ['title' => 'history'])

@section('content')
    <div class="container col-md-10 mt-4" style="margin-bottom: 5rem">

        @if (count($items) == 0)
            <div class="container col-md-6" style=" height: 80vh; post">
                <div class="card shadow mb-4 " style="margin-bottom: 4rem; margin-top: 4rem;">
                    <div class="card-body py-3 ">
                        <div class="d-flex" style="flex-direction: column;justify-content: center;text-align: center">
                            <h1 class="h1 m-0 font-weight-bold text-danger mb-4">{{ __('history_empty') }}</h1>
                            <i class="fas fa-times text-secondary mb-4" style="font-size: 100px"></i>
                            <p><b>{{ __('history_empty_message') }}</b></p>
                            <a href="../../{{ app()->getLocale() }}/home">{{ __('back_to_home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('history') }}</h6>
                </div>
                <div class="card-body ">
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    {{ __('price') }}
                                </th>
                                <th>
                                    {{ __('date') }}
                                </th>
                                <th>
                                    {{ __('time') }}
                                </th>
                                <th>
                                    Detail
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($item->price) }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($item->updated_at)) }}
                                    </td>
                                    <td>
                                        {{ date('h:i', strtotime($item->updated_at)) }}
                                    </td>
                                    <td style="display: flex;justify-content: center" >
                                        <a href="../../{{ app()->getLocale() }}/history/{{ $item->order_id }}" class="btn btn-primary btn-sm">
                                        Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        @endif
    </div>
@endsection
