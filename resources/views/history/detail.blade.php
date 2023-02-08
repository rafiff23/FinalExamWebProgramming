@extends('layouts.index', ['title' => 'history'])

@section('content')
    <div class="container mt-4" style="margin-bottom: 5rem">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3" style="display: flex; justify-content: space-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('history_on'). date('d-m-Y', strtotime($date))}}</h6>
                <a href="../../../{{ app()->getLocale() }}/history" class="btn btn-info btn-sm">
                  <i class="fas  fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="row">
                          <div class="col-sm-12">
                              <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid"
                                  aria-describedby="dataTable_info">
                                  <thead>
                                      <tr role="row">
                                          <th>{{ __('image') }}</th>
                                          <th>{{ __('name') }}</th>
                                          <th>{{ __('price') }}</th>
                                          <th>{{ __('quantity') }}</th>
                                          <th>SubTotal</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($details as $detail)
                                          <tr role="row" style="align-items: center">
                                              <td style=" display: flex; align-items: center; justify-content: center">
                                                  <div class="cropper"
                                                      style="width: 50px; height: 50px;position: relative;overflow: hidden;border-radius: 50%;">
                                                      @if ($detail->item->image_link == 'image_link')
                                                          <img src="https://www.healthyeating.org/images/default-source/home-0.0/nutrition-topics-2.0/general-nutrition-wellness/2-2-2-2foodgroups_vegetables_detailfeature.jpg?sfvrsn=226f1bc7_6"
                                                              class="card-img-top" alt="vege_img"
                                                              style="display: inline;
                                                          margin: 0 auto;
                                                          height: 100%;
                                                          width: auto;">
                                                      @else
                                                          <img src="{{ asset('storage/' . $detail->item->image_link) }}"
                                                              class="card-img-top" alt="vege_img"
                                                              style="display: inline;
                                                          margin: 0 auto;
                                                          height: 100%;
                                                          width: auto;">
                                                      @endif
                                                  </div>
                                              </td>
                                              <td style="vertical-align: middle">
                                                  <h6 class="text-gray-800 mb-0">
                                                      <b>
                                                          {{ $detail->item->item_name }},-
                                                      </b>
                                                  </h6>
                                              </td>
                                              <td style="vertical-align: middle">
                                                  <h6 class="text-gray-800 mb-0">
                                                      <b>
                                                          Rp. {{ number_format($detail->item->price) }},-
                                                      </b>
                                                  </h6>
                                              </td>
                                              <td style="vertical-align: middle">
                                                  <h6 class="text-gray-800 mb-0">
                                                      <b>
                                                          {{ $detail->quantity }}
                                                      </b>
                                                  </h6>
                                              </td>
                                              <td style="vertical-align: middle">
                                                  <h6 class="text-gray-800 mb-0">
                                                      <b>
                                                          Rp. {{ number_format($detail->item->price * $detail->quantity) }},-
                                                      </b>
                                                  </h6>
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
        </div>
    </div>
    </div>
@endsection
