<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
      </div>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;">Application Slip </h4>

    </div>
    <div class="content">
      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Applicant Name. : </div>
        <div style="margin: -23px 0px 0px 210px;">{{$cardapplicant->studentapplicant->surname.", ".$cardapplicant->studentapplicant->first_name}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Registration No. : </div>
        <div style="margin: -23px 0px 0px 210px;">{{$cardapplicant->reg_no}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Pin : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$cardapplicant->pin}}</div>
      </div>






  </div>

  </body>
</html>
