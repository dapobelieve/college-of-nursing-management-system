@extends('layouts.app')

@section('title')
Portal - Payment History
@endsection
@section('content')

      <div class="col-md-9">
          <div class="card">
              <div class="card-header text-center bg-success text-white">Dashboard - Registration History</div>

              <div class="card-body bg-light">
                <div class="row">
                  <div class="col-md-10">
                  <strong><label class="col-md-6 col-form-label text-md-left text-uppercase">{{ $user->last_name.", ".$user->first_name." ".$user->middle_name }}</label></strong>

                  </div>
                  <div class="col-md-2">
                    <div class="media">
                        @if(isset($user->images[0]->url))
                      <img class="ml-2 img-thumbnail rounded" src="{{$user->images[0]->url}}" alt="Generic placeholder image">
                      @else
                        <p class='text-danger'>Contact the Admin to upload your passport</p>
                        @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="form-group row">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>S/N</th>
                            <th>reference</th>
                            <th>Level</th>
                            <th>Amount</th>
                            <th>Approved</th>
                            <th>Date</th>
                            <th>Print</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($registered as $key => $value)
                            <?php $no = $key +1; ?>
                              <tr>
                                <td>{{$no}}</td>
                                <td>{{substr($value->reference,8)}}</td>
                                <td>{{substr($value->reference,4,3)}}</td>
                                <td class="text-center">{{$value->amount}}</td>
                                <td class="text-center">{{$value->status}}</td>
                                <td>{{date("d-M-Y",strtotime($value->created_at))}}</td>
                                <td><a href="{{action('PayTuitionController@downloadPDF', [$value->id, date("d-m-y",strtotime($value->created_at))])}}"><button type="button" class="btn btn-outline-info btn-sm">PRINT</button></a></td>
                              </tr>
                            @endforeach;
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

@section('script')

@endsection
