<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div>
      <div>
        <div style="float:left; "><img src="images/oysconmelogo.png" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; margin-right:45px;padding:0 100px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
        <div style="float:right; margin-top:-100px;"><img src="{{$student->pic_url}}" height="100" width ="100" alt="logo"></div>
      </div>
                <br>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;">Registration Form</h4>
      <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">Bank Ref: {{$payment->reference}}</span><span style="text-decoration: underline;padding-left:15px;">Amount Paid: {{$payment->amount}}</span></p>
    </div>
    <div style="text-align:center;padding:10px 40px;">

      <div>
        <div >
          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px;">
            <label><strong>Registration Number :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px;">
              <label style="text-decoration: underline;">{{$student->cardapplicant->reg_no}}</label>
          </div>
          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px;">
            <label><strong>Full name :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px;">
              <label style="text-transform: uppercase;">{{$student->surname.", ".$student->first_name." ".$student->middle_name}}</label>
          </div>
          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px;">
            <label><strong>date of birth :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px;">
              <label>{{$dob}}</label>
          </div>
          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>State of Origin :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label style="text-transform: uppercase;">{{$student->state_of_origin}}</label>
          </div>
          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>Local Government Area :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label style="text-transform: uppercase;">{{$student->lga}}</label>
          </div>

          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>Gender :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label>{{$student->gender}}</label>
          </div>

          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>Marital Status :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label>{{$student->marital_status}}</label>
          </div>

          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>Address :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label>{{$student->home_address.", ".$student->state}}</label>
          </div>

          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>Sponsor's name :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label style="text-transform: uppercase;">{{$student->sponsor_name}}</label>
          </div>

          <div style="clear:both"></div>
          <div style="float:left; margin-left:85px; margin-bottom: 15px; ">
            <label><strong>Sponsor Phone number :</strong></label>
          </div>
          <div style="float:right; margin-right:105px; margin-bottom: 15px; ">
              <label>{{$student->sponsor_phone}}</label>
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
