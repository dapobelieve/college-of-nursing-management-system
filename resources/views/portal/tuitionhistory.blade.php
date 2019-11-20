@extends('layouts.app')

@section('title')
Portal - Payment History
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{route('portal.dashboard')}}" role="tab" aria-controls="home">Home</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list"  href="{{route('portal.tuition')}}" role="tab" aria-controls="profile">Pay Tuition</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list"  href="{{route('portal.coursereg')}}" role="tab" aria-controls="messages">Course Registration</a>
          <a class="list-group-item list-group-item-action active" id="list-settings-list"  href="{{route('portal.tuitionhistory')}}" role="tab" aria-controls="settings">Payment History</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list"  href="{{route('portal.reghistory')}}" role="tab" aria-controls="settings">Registration History</a>
        </div>
      </div>
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
                      <img class="ml-2 img-thumbnail rounded" src="{{asset('images/akinkunmi005.jpg')}}" alt="Generic placeholder image">
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
                                <td>{{$value->reference}}</td>
                                <td>{{substr($value->reference,0,3)}}</td>
                                <td class="text-center">{{$value->amount}}</td>
                                <td class="text-center">{{$value->status}}</td>
                                <td>{{date("d-m-y",strtotime($value->created_at))}}</td>
                                <td><a href="{{action('RegHistoryController@downloadPDF', [$value->level." ".$value->semester, date("d-m-y",strtotime($value->created_at))])}}"><button type="button" class="btn btn-outline-info btn-sm">PRINT</button></a></td>
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
