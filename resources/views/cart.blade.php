@extends('layouts.index', ['title' => 'cart'])

@section('content')
    <div class="container mt-4">
        @if (count($orders) == 0)
            <div class="container col-md-6" style=" height: 80vh; post">
                <div class="card shadow mb-4 " style="margin-bottom: 4rem; margin-top: 4rem;">
                    <div class="card-body py-3 ">
                        <div class="d-flex" style="flex-direction: column;justify-content: center;text-align: center">
                            <h1 class="h1 m-0 font-weight-bold text-danger mb-4">{{ __('cart_empty') }}</h1>
                            <i class="fas fa-shopping-cart text-secondary mb-4" style="font-size: 100px"></i>
                            <p><b>{{ __('cart_empty_message') }}</b></p>
                            <a href="../../{{ app()->getLocale() }}/home">{{ __('back_to_home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @else

        <div class="container col-md-10" style="margin-bottom: 5rem">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('cart') }}</h6>
                </div>
                <div class="card-body ">
                    <div class="d-flex justify-content-center " style="flex-direction: column">
                        <div class="row mb-3 align-items-center border-bottom pb-3">
                            <div class="col-md-2" style="display: flex;justify-content: center">
                                <h6><b>{{ __('image') }}</b></h6>
                            </div>
                            <div class="col-md-2" style="display: flex;justify-content: center">
                                <h6><b>{{ __('name') }}</b></h6>
                            </div>
                            <div class="col-md-2" style="display: flex;justify-content: center">
                                <h6><b>{{ __('price') }}</b></h6>
                            </div>
                            <div class="col-md-2" style="display: flex;justify-content: center">
                                <h6><b>{{ __('quantity') }}</b></h6>
                            </div>
                            <div class="col-md-2" style="display: flex;justify-content: center">
                                <h6><b>SubTotal</b></h6>
                            </div>
                            <div class="col-md-2" style="display: flex;justify-content: center">
                                <h6><b>{{ __('action') }}</b></h6>
                            </div>
                        </div>
                        @foreach ($orders as $order)
                            <div class="row mb-3 align-items-center border-bottom pb-3">
                                <div class="d-flex justify-content-center col-md-2">
                                    <div class="cropper"
                                        style="width: 50px; height: 50px;position: relative;overflow: hidden;border-radius: 50%;">
                                        @if ($order->item->image_link == 'image_link')
                                            <img src="https://www.healthyeating.org/images/default-source/home-0.0/nutrition-topics-2.0/general-nutrition-wellness/2-2-2-2foodgroups_vegetables_detailfeature.jpg?sfvrsn=226f1bc7_6"
                                                class="card-img-top" alt="vege_img"
                                                style="display: inline;
                                                margin: 0 auto;
                                                height: 100%;
                                                width: auto;">
                                        @else
                                            <img src="{{ asset('storage/' . $order->item->image_link) }}"
                                                class="card-img-top" alt="vege_img"
                                                style="display: inline;
                                                margin: 0 auto;
                                                height: 100%;
                                                width: auto;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <h6 class="text-gray-800 mb-0">
                                        <b>
                                            {{ $order->item->item_name }}
                                        </b>
                                    </h6>
                                </div>
                                <div class=" col-md-2">
                                    <h6 class="text-gray-800 mb-0">
                                        <b>
                                            Rp. {{ number_format($order->item->price) }},-
                                        </b>
                                    </h6>
                                </div>
                                <div class=" col-md-2">
                                    <h6 class="text-gray-800 mb-0">
                                        <b>
                                            {{ number_format($order->quantity) }}
                                        </b>
                                    </h6>
                                </div>
                                <div class=" col-md-2">
                                    <h6 class="text-gray-800 mb-0">
                                        <b>
                                            Rp. {{ number_format($order->price) }}
                                        </b>
                                    </h6>
                                </div>
                                <div class="d-flex justify-content-center col-md-2">
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#cancelModal">{{ __('delete') }}
                                    </button>
                                    <form action="../en/cart/{{ $order->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog"
                                            aria-labelledby="cancelModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            {{ __('delete_item') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ __('delete_message') }}
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
                            </div>
                        @endforeach
                        <div class="d-flex pt-3" style="justify-content: space-between; align-items: center">
                            <div class=""></div>
                            <div class="" style="display: flex">
                                <h4><b>Total: Rp. {{ number_format($total) }},- </b></h4>
                                <div class="col"></div>
                                <form action="./cart" method="post">
                                    @csrf
                                    <button class="btn btn-success btn-icon-split" type="submit">

                                        <span class="icon text-white-50">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        <span class="text">{{ __('checkout') }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
