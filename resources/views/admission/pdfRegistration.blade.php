<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      <div>
        <div style="float:left; "><img src="{{asset('images/Oysconmetrans.png')}}" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; margin-right:45px;padding:0 100px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
        <div style="float:right; margin-top:-100px;"><img src="{{$student->pic_url}}" height="100" width ="100" alt="logo"></div>
      </div>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;">Registration Form</h4>

    </div>
    <div >

      <div>
        <div >
          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Registration number : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$student->cardapplicant->reg_no}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Fullname : </div>
            <div style="margin: -23px 0px 0px 210px;">{{$student->surname.", ".$student->first_name." ".$student->middle_name}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Date of Birth : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{date('d, M-Y', strtotime($student->dob))}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">State of Origin : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$state->name}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Gender : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$student->gender}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Marital Status : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$student->marital_status}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Address : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$student->home_address.", ".$student->state}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Sponsor's name : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$student->sponsor_name}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Sponsor Phone Number : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{$student->sponsor_phone}}</div>
          </div>

          <div style="margin : 15px;border: 1px solid #4CAF50;">
            <div style="margin-left : 10px;">Date of Exam : </div>
            <div style="margin: -23px 0px 0px 210px;"> {{date('d, M-Y', strtotime($student->date_exam))}} : 8:00am Prompt</div>
          </div>

        </div>
      </div>

  </div>
  <div style="text-align:center;padding:10px 40px;">
    <br>
    <br>
    <h4>Note:</h4><p style="text-align: left;"> Keep the scratch card you
      used appropriately, it will be needed during the Examination
       and also make sure you bring your registration form along with
    you. </p>
    <p style="clear:both;"></p>
    <br>
    <br>
    <p style="text-align: center;"><span style="border-top: 2px dotted black;padding: 0px 40px;float:left;">//</span>  <span style="border-top: 2px dotted black;padding: 0px 40px;float:right;">STUDENT'S SIGNATURE</span></p>
  </div>
  </body>
</html>
