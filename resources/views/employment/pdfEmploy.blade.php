<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      <div>
        <div style="float:left; "><img src="{{'images/Oysconmetrans.png'}}" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; margin-right:45px;padding:0 100px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
        <div style="float:right; margin-top:-100px;"><img src="{{$applicant->pic_url}}" height="100" width ="100" alt="logo"></div>
      </div>
                <br>
      <h2 style="text-decoration: underline;text-align: center; clear:both;">Job Application Form</h2>

      <h4 style="text-decoration: underline;text-align: center; clear:both;">Personal Information</h4>

    </div>
    <div >

      <div>
        <div >
          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Email address : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->email}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Fullname : </div>
            <div style="margin: -23px 0px 0px 210px;">{{$applicant->full_name}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Gender : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->sex}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Date of Birth : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{date("d, M-Y", strtotime($applicant->dob))}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Address : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->address.", ".$applicant->city}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">State of Origin : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->state}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Local Government : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->lga}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Postion Applied for : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->position}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Employment Type : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$applicant->emp_type}}</div>
          </div>
        </div>
      </div>

  </div>

  <h4 style="text-decoration: underline;text-align: center; clear:both;">Education Background</h4>

  <div >

    <div>
      <div >
        @foreach($education as $edu)
        <div style="margin : 15px;border: 1px solid #4CAF50;">
          <div style="margin-left : 10px;">Institution : </div>
          <div style="margin: -23px 0px 0px 210px;"> {{$edu->schoolname}}</div>
        </div>

        <div style="margin : 15px;border: 1px solid #4CAF50;">
          <div style="margin-left : 10px;">Major : </div>
          <div style="margin: -23px 0px 0px 210px;">{{$edu->major}}</div>
        </div>

        <div style="margin : 15px;border: 1px solid #4CAF50;">
          <div style="margin-left : 10px;">certified : </div>
          <div style="margin: -23px 0px 0px 210px;"> {{$edu->certified}}</div>
        </div>

        <div style="margin : 15px;border: 1px solid #4CAF50;">
          <div style="margin-left : 10px;">Start Date : </div>
          <div style="margin: -23px 0px 0px 210px;"> {{date("d, M-Y", strtotime($edu->start_date))}}</div>
        </div>

        <div style="margin : 15px;border: 1px solid #4CAF50;">
          <div style="margin-left : 10px;">End Date : </div>
          <div style="margin: -23px 0px 0px 210px;"> {{date("d, M-Y", strtotime($edu->end_date))}}</div>
        </div>

        <div style="margin : 15px;border: 1px solid #4CAF50;">
          <div style="margin-left : 10px;">Address : </div>
          <div style="margin: -23px 0px 0px 210px;"> {{$edu->location}}</div>
        </div>


        <br>
        @endforeach

      </div>
    </div>

</div>

<h4 style="text-decoration: underline;text-align: center; clear:both;">Employment History</h4>

<div >

  <div>
    <div >
      @foreach($employ as $edu)
      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Employer/Company : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$edu->employer}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Job Title : </div>
        <div style="margin: -23px 0px 0px 210px;">{{$edu->job_title}}</div>
      </div>


      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Employment Date : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{date("d, M-Y", strtotime($edu->emp_date))}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Address : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$edu->address}}</div>
      </div>


      <br>
      @endforeach

    </div>
  </div>

</div>

<h4 style="text-decoration: underline;text-align: center; clear:both;">Referees</h4>

<div >

  <div>
    <div >
      @foreach($referee as $edu)
      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Name : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$edu->name}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Position Held : </div>
        <div style="margin: -23px 0px 0px 210px;">{{$edu->position}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Work Place : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$edu->company}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Phone Number : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$edu->phone}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Address : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$edu->address}}</div>
      </div>




      <br>
      @endforeach

    </div>
  </div>

</div>
  <div style="text-align:center;padding:10px 40px;">
    <br>
    <br>
    <h4></h4><p style="text-align: left;">  </p>
    <p style="clear:both;"></p>
    <br>
    <br>
    </div>
  </body>
</html>
