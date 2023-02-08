@extends('layouts.index', ['title' => 'itemEdit'])

@section('content')
    <div class="container col-md-6 mt-4" style="margin-bottom: 5rem">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('add_item') }}</h6>
            </div>
            <div class="card-body ">
                <form class="needs-validation" action="../../../{{ app()->getLocale() }}/item/{{ $item->item_id }}"
                    method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">{{ __('item_name') }}</label>
                        <input type="text" name="item_name" value="{{ old('item_name', $item->item_name) }}"
                            class="form-control" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('price') }}</label>
                        <input type="number" name="price" value="{{ old('price', $item->price) }}" class="form-control"
                            id="price" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom05" class="form-label">{{ __('display_picture') }}</label>
                        <img src="{{ asset('storage/' . $item->image_link) }}" class="img-preview img-fluid mb-3"
                            alt="vege_img" id="img-preview">
                        <input class="form-control @error('image_link') is-invalid @enderror" type="file"
                            id="image" name="image_link" onchange="previewImage()">
                        {{-- @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror --}}
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">{{ __('description') }}</label>
                        <input id="body" type="hidden" name="item_desc"
                            value="{{ old('item_desc', $item->item_desc) }}" class="form-control" required>
                        <trix-editor input="body"></trix-editor>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">{{ __('edit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })
        const previewImage = () => {
            const image = document.querySelector('#image')
            const imagePreview = document.querySelector('#img-preview')

            imagePreview.style.display = 'block'

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
