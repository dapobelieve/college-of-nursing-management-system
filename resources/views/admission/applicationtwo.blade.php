@extends('admission.app')

@section('title')
Admission - Form two
@endsection
@section('content')

<section class='admission_form'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12 my-5'>
                        <h2>Application for Admission - <span class="badge badge-success">Step Two</span></h2>
                    </div>
                </div>
    <form class="" action="{{route('application.update', ['Studentapplicant'=>$id])}}" method="post">
      @csrf
      <input type="hidden" name="_method" value="PUT">
          <div class="row">
            <span>
                @foreach($errors->all() as $error)
                    <strong style="color: red">*{{ $error }}</strong> <br>
                @endforeach
                @if(Session::has('error'))
                    <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                @endif
            </span>

          </div>
                        <div class='row'>

                            <div class='col-md-6'>

                               <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Relationship with Sponsor</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='sponsor_type' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='parent'>Parent</option>
                                            <option value='guardian'>Guardian</option>
                                            <option value='other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Sponsor's Name</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='sponsor_name'  value="{{ old('sponsor_name') }}" class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Sponsor's Phone number</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='sponsor_phone'  value="{{ old('sponsor_phone') }}" class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Sponsor's Email</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='email' name='sponsor_email'  value="{{ old('sponsor_email') }}" class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Sponsor's Address</label>
                                    </div>
                                    <div class='col-lg-8'>
                                      <textarea name="sponsor_add" rows="3" cols="28"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class='col-md-6'>
                                <div class='row form-group'>
                                  <div class='col-lg-4'>
                                      <label></label>
                                  </div>
                                  <div class='col-lg-8'>
                                      <label><h3>
                                          RESULT</h3></label>
                                  </div>
                                </div>
                                
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Jamb Reg. Number</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='jamb_no'  value="{{ old('jamb_no') }}" class='form-control' required title="Provide Jamb registration number" >
                                    </div>
                                </div>
                                
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Jamb score</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='jamb_score'  value="{{ old('jamb_score') }}" class='form-control' required title="note: score must be above 200">
                                    </div>
                                </div>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Exam Type</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='exam_type' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='WAEC'>WAEC</option>
                                            <option value='NECO'>NECO</option>
                                            <option value='GCE'>GCE</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Exam Number</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='exam_no'  value="{{ old('exam_no') }}" class='form-control' required title="Provide exam registration number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Mathematics') }}</label>
                                    <div class="col-md-6">
                                      <select class="form-control" id="mathematics" name="mathematics" required>
                                          <option value=""> </option>
                                          <option value="AR">AR</option>
                                          <option value="A1">A1</option>
                                          <option value="B2">B2</option>
                                          <option value="B3">B3</option>
                                          <option value="C4">C4</option>
                                          <option value="C5">C5</option>
                                          <option value="C6">C6</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('English') }}</label>
                                    <div class="col-md-6">
                                      <select class="form-control" id="english" name="english" required>
                                          <option value=""> </option>
                                          <option value="AR">AR</option>
                                          <option value="A1">A1</option>
                                          <option value="B2">B2</option>
                                          <option value="B3">B3</option>
                                          <option value="C4">C4</option>
                                          <option value="C5">C5</option>
                                          <option value="C6">C6</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Biology') }}</label>
                                    <div class="col-md-6">
                                      <select class="form-control" id="biology" name="biology" required>
                                          <option value=""> </option>
                                          <option value="AR">AR</option>
                                          <option value="A1">A1</option>
                                          <option value="B2">B2</option>
                                          <option value="B3">B3</option>
                                          <option value="C4">C4</option>
                                          <option value="C5">C5</option>
                                          <option value="C6">C6</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Physics') }}</label>
                                    <div class="col-md-6">
                                      <select class="form-control" id="physics" name="physics" required>
                                          <option value=""> </option>
                                          <option value="AR">AR</option>
                                          <option value="A1">A1</option>
                                          <option value="B2">B2</option>
                                          <option value="B3">B3</option>
                                          <option value="C4">C4</option>
                                          <option value="C5">C5</option>
                                          <option value="C6">C6</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exam_no" class="col-md-4 col-form-label text-md-right">{{ __('Chemistry') }}</label>
                                    <div class="col-md-6">
                                      <select class="form-control" id="chemistry" name="chemistry" required>
                                          <option value=""> </option>
                                          <option value="AR">AR</option>
                                          <option value="A1">A1</option>
                                          <option value="B2">B2</option>
                                          <option value="B3">B3</option>
                                          <option value="C4">C4</option>
                                          <option value="C5">C5</option>
                                          <option value="C6">C6</option>
                                      </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12 text-center'>
                              <button type='submit' onclick="myFunction()" class='btn btn-default btn-courses mt-4' id='js-admission-btn'>Save</button>
                              <script>
                                  function myFunction() {
                                    var txt;
                                    if (confirm("You are about to save, Are you sure?")) {
                                      return true;
                                    } else {
                                      return false;
                                    }

                                  }
                                  </script>
                            </div>
                            <div class='col-md-12'>
                                <div id='js-admission-result' data-success-msg='Success, Your application has been sent' data-error-msg='Oops! Something went wrong'></div>
                                <!-- // end #js-admission-result -->
                            </div>
                        </div>
                    </form>
                </div>
</section>
@stop
@section('script')

@stop
