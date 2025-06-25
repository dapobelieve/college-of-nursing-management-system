<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <style>
    body {
      background-image: url("{{ asset('images/Oysconmefaded.png') }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .content {
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.8); /* optional white overlay */
    }
  </style>
  </head>
  <body>

    <div>
      <div>
        <div style="float:left; "><img src="{{asset('images/Oysconmetrans.png')}}" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; margin-right:45px;padding:0 50px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
         <div style="float:right; margin-top:-100px;"><img src="{{$student->pic_url}}" height="100" width ="100" alt="logo"></div>
      </div>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;">Examination Result Slip </h4>

    </div>
    <div class="content">

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Registration No. : </div>
        <div style="margin: -23px 0px 0px 210px;">{{$student->cardapplicant->reg_no}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Name : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$student->surname.", ".$student->first_name." ".$student->middle_name}}</div>
      </div>
      
      
      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Score: </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$student->score}}%</div>
      </div>






  </div>

  </body>
</html>
