@extends('layouts.index', ['title' => 'detail'])

@section('content')
    <div class="container mt-5" style="margin-bottom: 6rem">
        @if (session()->has('success'))
            <div class="alert alert-success ml-auto mr-auto col-12" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card" style="min-height: 300px">
            <div class="row">
                <div class="col-md-4">
                    @if ($item->image_link == 'image_link')
                        <img src="https://www.healthyeating.org/images/default-source/home-0.0/nutrition-topics-2.0/general-nutrition-wellness/2-2-2-2foodgroups_vegetables_detailfeature.jpg?sfvrsn=226f1bc7_6"
                            class="card-img-top" alt="vege_img">
                    @else
                        <img src="{{ asset('storage/' . $item->image_link) }}" class="card-img-top" alt="vege_img">
                    @endif
                </div>
                <div class="col-md-8 px-4 py-4" style="display: flex ;flex-direction: column; justify-content: space-between" >
                    <h3><b>Price: Rp. {{ number_format($item->price) . ',-' }}</b></h3>
                    <article class="fs-5">
                        {!! $item->item_desc !!}
                    </article>
                    <div class="d-flex justify-content-end">
                        <form action="./{{ $item->item_id }}" method="POST">
                            @csrf
                            <div class="d-flex" style="flex-direction: column">
                                <div class="d-flex mb-3" style="align-items: flex-end">
                                    <h6 class="mr-4">{{ __('quantity') }}</h6>
                                    <input name="qty" class="form-control" type="number" min="1" style="width: 3" required>
                                </div>
                                <button class="btn btn-success px-4" type="submit">
                                    <i class="fas fa-shopping-cart"></i>
                                    {{ __('buy') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
