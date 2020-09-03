<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      <div>
        <div style="float:left; "><img src="images/Oysconmetrans.png" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; margin-right:45px;padding:0 50px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
      </div>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;">Receipt for Acceptance </h4>

    </div>
    <div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Fullname : </div>
        <div style="margin: -23px 0px 0px 210px;">{{$student->surname.", ".$student->first_name." ".$student->middle_name}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Registration number : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$student->cardapplicant->reg_no}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Email Address : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$student->email}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Amount Paid : </div>
        <div style="margin: -23px 0px 0px 210px;"> {{$payment->last()->amount}}</div>
      </div>

      <div style="margin : 15px;border: 1px solid #4CAF50;">
        <div style="margin-left : 10px;">Bank Charges : </div>
        <div style="margin: -23px 0px 0px 210px;"> Yes</div>
      </div>




  </div>
  <div style="text-align:center;padding:10px 40px;">
    <br>
    <br>
    <h4>Note:</h4><p style="text-align: left;"> The above student has fully paid the acceptance fee into Oyo state College of Nursing and Midwifery</p>
    <p style="clear:both;"></p>
    <br>
    <br>
    <p style="text-align: center;"><span style="border-top: 2px dotted black;padding: 0px 40px;float:left;">/</span>  <span style="border-top: 2px dotted black;padding: 0px 40px;float:right;">ACCOUNTANT'S SIGNATURE</span></p>
  </div>
  </body>
</html>
