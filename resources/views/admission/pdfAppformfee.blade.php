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
      <h3 style="text-align: center; margin-right:45px;padding:0 50px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
      </div>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;">Invoice </h4>

    </div>
    <div>

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
