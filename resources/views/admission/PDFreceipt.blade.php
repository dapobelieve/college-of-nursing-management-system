<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style='background-image:url("images/oysconmelogo.png");'>

    <div>
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
                <br>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;"> Application Form Receipt,</h4>
     <p style="text-align: center;"><span style="text-decoration: underline;padding-left:2px;">Registration No.: {{" ".$student->cardapplicant->reg_no}}</span><strong><span style="text-decoration: underline;padding-left:15px;">Fullname: {{$student->surname.", ".$student->first_name." ".$student->middle_name}}</span></strong></p>
        <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;"></span> <span style="text-decoration: underline;padding-left:15px;"> Level:  @if($payment->payment_modes_id == 1)Online/{{$payment->reference}} @else Teller/{{$payment->reference}} @endif</span><span style="text-decoration: underline;padding-left:15px;">Date: {{$payment->created_at}}</span></p>

    </div>
    <div style="text-align:center;padding:10px 40px;">
      <hr>
    <div class="container">
      <div class="row">
        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px;">
          <label><strong>Paid the sum of :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px;">
            <label>@if($payment->payment_modes_id == 1) N{{$payment->amount}}.00 @else N{{$payment->amount}} @endif</label>
        </div>
        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px;">
          <label><strong>Bank Charges :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px;">
            <label>@if($payment->payment_modes_id == 1) N300.00 @else No charges @endif</label>
        </div>

        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Bank reference :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>@if($payment->payment_modes_id == 1)Online/{{$payment->reference}} @else Teller/{{$payment->reference}} @endif</label>
        </div>

        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Date of Payment :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>{{$payment->created_at}}</label>
        </div>

        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Email Address :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>{{$student->email}}</label>
        </div>

        <div style="clear:both"></div>
        <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
          <label><strong>Being Payment for :</strong></label>
        </div>
        <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
            <label>Application Form</label>
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
