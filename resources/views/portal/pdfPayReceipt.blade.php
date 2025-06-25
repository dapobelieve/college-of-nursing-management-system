<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style='background-image:url("images/oysconmelogo.png");'>

    <div>
      <div>
        <div style="float:left; "><img src="images/Oysconmetrans.png" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; margin-right:45px;padding:0 100px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
        <div style="float:right; margin-top:-100px;"><img src="{{$user->images[0]->url}}" height="100" width ="100" alt="logo"></div>
      </div>
                <br>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;"> Tuition Fee Receipt,</h4>
    <!--  <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">Session:</span> <span style="text-decoration: underline;padding-left:15px;">Semester:  </span><span style="text-decoration: underline;padding-left:15px;">Date: {{$dated}}</span></p>
    -->  <p style="text-align: center;"><span style="text-decoration: underline;padding-left:2px;">Matric No: {{" ".$student->matric_no}}</span><strong><span style="text-decoration: underline;padding-left:15px;">Fullname: {{$user->last_name.", ".$user->first_name." ".$user->middle_name}}</span></strong></p>
        <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">Session: 20{{$session}}/20{{$session + 1}}</span> <span style="text-decoration: underline;padding-left:15px;">Level: {{substr($payment->reference,4,3)}}</span><span style="text-decoration: underline;padding-left:15px;">Date: {{$dated}}</span></p>
        <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">State of Origin: {{$origin->name}}</span> <span style="text-decoration: underline;padding-left:15px;">Late payment charges: {{$late}} </span></p>

    </div>
    <div style="text-align:center;padding:10px 40px;">
      <hr>
    <div class="container">
      <div class="row">
        <div style="float:left; margin-left:85px; margin-bottom: 15px;">
          <label><strong>Paid the sum of :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px;">
            <label>{{$payment->amount}}</label>
        </div>
        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Bank reference :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>{{substr($payment->reference,8)}}</label>
        </div>
        
        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Email address :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>{{$user->email}}</label>
        </div>

        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Date of Payment :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>{{$dated}}</label>
        </div>

        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Being Payment for :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>TUITION FEE</label>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div style="text-align:center;padding:10px 40px;">
    <br>
    <br>
    <p style="text-align: center;"><span style="border-top: 2px dotted black;padding: 0px 60px;float:right;">Accountant's signature/date</span></p>
    <p style="clear:both;"></p>
    <br>
    <br>
  </div>
  </body>
</html>
