@extends('layouts.index', ['title' => 'item'])

@section('content')
    <div class="mt-3" style="margin-bottom: 6rem">
        <div class="container col-md-12 mt-3" style="margin-bottom: 5rem">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('head_home') }}</h6>
                </div>
                <div class="card-body ">
                    <div class="container">
                        <a href="../../{{ app()->getLocale() }}/item/create" class="btn btn-success btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">{{ __('add_item') }}</span>
                        </a>
                    </div>
                    <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3 d-flex" style="justify-content: center">
                        @foreach ($items as $item)
                            <div class="card mr-3">
                                <div class="cropper mr-4"
                                    style="width: 100%;
                    height: 100px;
                    position: relative;
                    overflow: hidden;
                    ">
                                @if ($item->image_link == 'image_link')
                                    <img src="https://www.healthyeating.org/images/default-source/home-0.0/nutrition-topics-2.0/general-nutrition-wellness/2-2-2-2foodgroups_vegetables_detailfeature.jpg?sfvrsn=226f1bc7_6"
                                        class="card-img-top" alt="vege_img">
                                @else
                                    <img src="{{asset("storage/".$item->image_link)  }}"
                                        class="card-img-top" alt="vege_img">
                                @endif
                    </div>
                                <div class="card-body">
                                    <h6 class="card-title"><b>{{ $item->item_name }}</b></h6>
                                    <div class="d-flex" style="justify-content: space-between">
                                        <a href="../../{{ app()->getLocale() }}/item/{{ $item->item_id }}/edit"
                                            class="btn btn-primary btn-sm">{{ __('edit') }}</a>
                                        <form action="../../{{ app()->getLocale() }}/item/{{ $item->item_id }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">{{ __('delete') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
