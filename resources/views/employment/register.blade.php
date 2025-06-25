<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
       <meta name="google-site-verification" content="BjSsMqORFlJjFvcLoTXTEVMshXUPrZODIXtxe_aQ9O0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('images/Oysconmetrans.png')}}" type="image/png" sizes="16x16">
    <title>
         Job application
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstraps.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:200,400" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{asset('css/simple-line-icons.css')}}">
    <!-- Calendar Css -->
    <link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- Main CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link href="{{asset('css/larastyle.css')}}" rel="stylesheet">
</head>

<body>
    <!--============================= HEADER =============================-->

    <header>
        @include('layouts._nav')

    </header>


</body>
<!-- modal to display successful application-->
@if($section == 'apply')
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle"><span class="badge badge-success">Application successful</span></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body text-center">
      <span id="ffir" style="font-size: 5em; color: green;"> <i class="fa fa-spinner fa-pulse"></i> </span>
        <span id="ffsc" style="font-size: 6em; color: green;"><i class="fa fa-check-square"></i></span>
    </div>
    <div class="modal-footer">
      <a href="{{route('welcome')}}"><button type="button" class="btn btn-success"><span class="badge badge-light"><i class="fa fa-check-circle"></i></span>Go Home</button></a>
    </div>
  </div>
  </div>
  </div>
  @else
<!-- end of modal-->
<div class="container-sm" style="background-color:#f09ac0;">
  <div class="row">
      <div class="col-md-12">
      <span>
          @foreach($errors->all() as $error)
              <strong style="color: red">*{{ $error }}</strong> <br>
          @endforeach
          @if(Session::has('error'))
              <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
          @endif
      </span>

    </div>
    <div class="col-md-12">
              <p>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Print Application Form
          </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body col-md-6">
            <form class="form-inline" method="POST" action="{{route('employment.pdf')}}">
              @csrf
              <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Email</label>
                <input type="email" name="email" class="form-control" id="inpute2" placeholder="Email" required>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Print</button>
              </form>
          </div>
        </div>
    </div>
  </div>

  <div class="row">
  <!--  <form id="regForm" method="post" action="{{route('employment.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
  <h2>Job Application</h2>


  <!-- One "tab" for each step in the form:
  <div class="tab">
    <div class="alert alert-dark alert-xs text-center" role="alert">
      <h3>  Personal Information </h3>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Title</label>
      <select id="inputState" name="title"class="form-control needTo"  oninput="this.className = ''" required>
        <option selected="" value="">select </option>
        <option>Mr</option>
        <option>Mrs</option>
        <option>Miss</option>
      </select>
    </div>
    <div class="form-group col-md-8">
      <label for="inputName">Full name</label>
      <input type="text" name="full_name" class="form-control needTo" id="inputEmail4"  oninput="this.className = ''" title="Provide your full name" placeholder="Owolabi, Akinkunmi Abraham" required>
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Gender</label>
      <select id="inputState" name="sex" class="form-control needTo"  oninput="this.className = ''" required>
        <option selected="" value="">select </option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputPhone">DoB</label>
      <input type="date" name="dob" class="form-control needTo" id="inputPassword4"  oninput="this.className = ''" title="Date of birth" required>
    </div>
  <div class="form-group col-md-4">
    <label for="inputPhone">Phone Number</label>
    <input type="number" name="phone" class="form-control needTo" id="inputPhone0"  oninput="this.className = ''" title="Please provide phone number in this format (08080022555)" placeholder="08180000223" required>
    <span class="error text-danger" id="inphonerror"></span>
  </div>
  <div class="form-group col-md-5">
    <label for="inputEmail4">Email address</label>
    <input type="email" name="email" class="form-control needTo" id="inputEmail7" placeholder="akin@123.com"  oninput="this.className = ''" required>
    <span class="error text-danger" id="inperror"></span>
  </div>
</div>
  <div class="form-group">
    <label for="inputAddress2">Presnt Address</label>
    <input type="text" name="address" class="form-control needTo" id="inputAddress2" placeholder="123 main st"  oninput="this.className = ''" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Present City</label>
      <input type="text" name="city" class="form-control needTo" id="inputCity"  oninput="this.className = ''" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State of Origin</label>
      <select id="inputState" onchange="getLga(event)" name="state" class="form-control needTo"  oninput="this.className = ''" required>
        <option selected="" value="">select </option>
        @foreach($states as $dep)
            <option value="{{$dep->id.','.$dep->name}}">{{$dep->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">LGA</label>
      <select id="lga" name="lga" class="form-control needTo"  oninput="this.className = ''" required>
      </select>
    </div>
    <script>
        function getLga(event)
        {
            event.preventDefault();
            var stateId = event.target.value;
            var arr = stateId.split(",");
            stateId = arr[0];
            console.log(stateId);
            fetch(`/api/get-location/${stateId}`, {
                method: 'GET'
            })
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById('lga');
                    select.innerHTML = "";
                    data.forEach((ele) => {
                        let op = document.createElement('option');
                        op.appendChild(document.createTextNode(ele.lga));
                        op.setAttribute('value', ele.lga);
                        select.insertAdjacentElement('beforeend', op);
                    })
                });
        }
    </script>
  </div>
  <div class="form-group">
      <label class="form-check-label" for="gridCheck">
      If selected for employment are you willing to submit to a pre-employment drug screening test?
      </label>
      <select id="inputState" name="drug" class="form-control needTo"  oninput="this.className = ''" required>
        <option selected="" value="">select </option>
        <option>NO</option>
        <option>YES</option>
      </select>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputPhone">Position you are applying for </label>
    <input type="text" name="position" class="form-control needTo" id="inputPassword4"  oninput="this.className = ''" placeholder="...." required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4">Employment Desired</label>
    <select id="inputState" name="desire" class="form-control needTo"  oninput="this.className = ''" required>
      <option selected="" value="">select </option>
      <option>Part-time</option>
      <option>Full-time</option>
    </select>
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-8">
  <label for="inputPhone">Upload your passport </label>
  <input type="file" name="passport" class="form-control col-md-6 "  id="pdata"  required>
  <span class="error text-primary">Note: passport size should be less than 300kb & should have maximum width of 400px</span>
</div>
</div>

  </div>
  <!-- personal infoormation ended
<!-- Education backgroound section

  <div class="tab">
          <div class="alert alert-dark alert-xs text-center" role="alert">
            <h3>  Education </h3>
        </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPhone">Institution</label>
            <input type="text" name="school0" class="form-control needTo" id="inputSchool"  oninput="this.className = ''" placeholder="Havard University" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Location</label>
            <input type="text" name="location0" class="form-control needTo" id="inputAddress" placeholder="Ibadan, Nigeria"  oninput="this.className = ''" required>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputPhone">Start date</label>
          <input type="date" name="start_date0" class="form-control needTo" id="inputSchool"  oninput="this.className = ''" required>
        </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">End date</label>
            <input type="date" name="end_date0" class="form-control needTo" id="inputAddress"  oninput="this.className = ''" required>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputDegree">Degree Recieved</label>
          <input type="text" name="degree0" class="form-control needTo" id="inputSchool"  oninput="this.className = ''" required>
        </div>
        <div class="form-group col-md-3">
          <label for="inputMajor">Major</label>
          <input type="text" name="major0" class="form-control needTo" id="inputAddress"  oninput="this.className = ''" required>
        </div>
        </div>

        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span class="badge badge-light">+</span>Add Education
            </a>
            <div class="collapse" id="collapseExample1">
              <div class="card card-body">
                <h4>optional</h4>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputPhone">Institution</label>
              <input type="text" name="school1" class="form-control" id="inputSchool"  placeholder="optional">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Location</label>
              <input type="text" name="location1" class="form-control" id="inputAddress" placeholder="Ibadan, Nigeria" >
            </div>
          </div>
            <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputPhone">Start date</label>
              <input type="date" name="start_date1" class="form-control" id="inputSchool">
            </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4">End date</label>
                <input type="date" name="end_date1" class="form-control" id="inputAddress" >
              </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputDegree">Degree Recieved</label>
              <input type="text" name="degree1" class="form-control" id="inputSchool" >
            </div>
            <div class="form-group col-md-3">
              <label for="inputMajor">Major</label>
              <input type="text" name="major1" class="form-control" id="inputAddress" >
            </div>
            </div>
              </div>
          </div>
        </div>
<!--end of edduucation
<!-- rreferees section
  <div class="tab">
      <div class="alert alert-dark alert-xs text-center" role="alert">
        <h3>  Referees </h3>
    </div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="inputEmail4">Title</label>
            <select id="inputState" name="R_title0"class="form-control needTo"  oninput="this.className = ''" required>
              <option selected="" value="">select </option>
              <option>Mr</option>
              <option>Mrs</option>
              <option>Miss</option>
            </select>
          </div>
          <div class="form-group col-md-10">
            <label for="inputName">Full name</label>
            <input type="text" name="R_full_name0" class="form-control needTo" id="inputEmail4"  oninput="this.className = ''" placeholder="Please provide reeferee's name" required>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputPhone">Position</label>
          <input type="text" name="R_position0" class="form-control needTo" id="inputSchool"  oninput="this.className = ''" placeholder="please provide" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Place of work</label>
          <input type="text" name="R_company0" class="form-control needTo" id="inputAddress" placeholder="please provide"  oninput="this.className = ''" required>
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-8">
        <label for="inputPhone">Full Address</label>
        <input type="text" name="R_address0" class="form-control needTo" id="inputSchool" placeholder="please providee full address"  oninput="this.className = ''" required>
      </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Phone</label>
          <input type="number" name="R_phone0" class="form-control needTo" id="inputPhone2"  oninput="this.className = ''" required>
        </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="inputEmail4">Title</label>
          <select id="inputState" name="R_title1"class="form-control needTo"  oninput="this.className = ''" required>
            <option selected="" value="">select </option>
            <option>Mr</option>
            <option>Mrs</option>
            <option>Miss</option>
          </select>
        </div>
        <div class="form-group col-md-10">
          <label for="inputName">Full name</label>
          <input type="text" name="R_full_name1" class="form-control needTo" id="inputEmail4"  oninput="this.className = ''" placeholder="Owolabi, Akinkunmi" required>
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputPhone">Position</label>
        <input type="text" name="R_position1" class="form-control needTo" id="inputSchool"  oninput="this.className = ''" placeholder="please provide" required>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4">Place of work</label>
        <input type="text" name="R_company1" class="form-control needTo" id="inputAddress" placeholder="please provide"  oninput="this.className = ''" required>
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputPhone">Full Address</label>
      <input type="text" name="R_address1" class="form-control needTo" id="inputSchool" placeholder="please providee full address"  oninput="this.className = ''" required>
    </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4">Phone</label>
        <input type="number" name="R_phone1" class="form-control needTo" id="inputPhone3"  oninput="this.className = ''" required>
      </div>
    </div>

  </div>

  <div class="tab">
      <div class="alert alert-dark alert-xs text-center" role="alert">
        <h3>  Employment History </h3>
    </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Employer</label>
            <input type="text" name="E_employer0" class="form-control needTo" id="inputEmail4"  oninput="this.className = ''" placeholder="" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputName">Job Title</label>
            <input type="text" name="E_title0" class="form-control needTo" id="inputEmail4"  oninput="this.className = ''" placeholder="" required>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-8">
          <label for="inputPhone">Full Address</label>
          <input type="text" name="E_address0" class="form-control needTo" id="inputSchool"  oninput="this.className = ''" placeholder="please providee full address" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4">Date Employed</label>
          <input type="date" name="E_date0" class="form-control needTo" id="inputAddress" placeholder=""  oninput="this.className = ''" required>
        </div>
      </div>

      <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span class="badge badge-light">+</span>Add Employer
          </a>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <h4>Optional</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Employer</label>
                  <input type="text" name="E_employer1" class="form-control" id="inp"  oninput="this.className = ''" placeholder="optional">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputName">Job Title</label>
                  <input type="text" name="E_title1" class="form-control" id="inputEm"  oninput="this.className = ''" placeholder="optional">
                </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-8">
                <label for="inputPhone">Full Address</label>
                <input type="text" name="E_address1" class="form-control" id="inputSchool"  oninput="this.className = ''" placeholder="please providee full address">
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4">Date Employed</label>
                <input type="date" name="E_date1" class="form-control" id="inputAddress" placeholder="optional"  oninput="this.className = ''">
              </div>
            </div>
          </div>
        </div>
    </div>



  <div style="overflow:auto;">
    <span class="error text-danger" id="inperror2"></span>
    <div style="float:right;">
      <button type="button" class="btn-sm btn-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" class="btn-sm btn-primary" id="nextBtn" onclick="nextPrev(1)">Next</button>

        <button type="submit" class="btn btn-warning" id="js-submit-btn">Submit</button>
    </div>

  </div>

  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>

  </form> -->
  </div>

</div>
@endif



@include('layouts._footer')
    @include('layouts._scripts2')
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#exampleModalCenter').modal('show');
        });

$(document).ready(function(){
  $('#ffsc').hide();
  setTimeout(function(){
    $('#ffir').hide();
     $('#ffsc').show();
   }, 2000);
});


    </script>
</html>
