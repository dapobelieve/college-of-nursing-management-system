<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style='background-image:url("images/oysconmelogo.png");'>

    <div>
      <div>
        <div style="float:left; "><img src="images/oysconmelogo.png" height="100" width ="100" alt="logo"></div>
      <h3 style="text-align: center; float:right; margin-right:65px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br> ELEYELE IBADAN
                OYO STATE.</h3>
      </div>
                <br>
      <h4 style="text-decoration: underline;text-align: center; clear:both;"> Tuition Fee Receipt,</h4>
    <!--  <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">Session:</span> <span style="text-decoration: underline;padding-left:15px;">Semester: {{$sem}} </span><span style="text-decoration: underline;padding-left:15px;">Date: {{$dated}}</span></p>
    -->  <p style="text-align: center;"><span style="text-decoration: underline;padding-left:2px;">Matric No: {{" ".$student->matric_no}}</span><strong><span style="text-decoration: underline;padding-left:15px;">Fullname: {{$user->last_name.", ".$user->first_name." ".$user->middle_name}}</span></strong></p>
      <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">Session:</span> <span style="text-decoration: underline;padding-left:15px;">Amount Paid: </span><span style="text-decoration: underline;padding-left:15px;">Date: {{$dated}}</span></p>
      <p style="text-align: center;"><span style="text-decoration: underline;padding-left:15px;">Ref. No.:</span> <span style="text-decoration: underline;padding-left:15px;">Bank Ref.: </span></p>

    </div>
    <div style="text-align:center;padding:10px 40px;">
      <table style="border-collapse:separate;border-spacing: 2px;">
        <thead style="text-align: center;">
          <tr style="padding:10px;">
            <th style="padding:8px 108px;"></th>
            <th style="padding:8px 27px;">=N= : =K=</th>
          </tr>
        </thead>
        <tbody>

          <tr style="padding:10px;text-align:center;">
            <td style="border-bottom: 1px solid black;border-left: 1px solid black;">
              {{$no}}
            </td>
            <td style="border-bottom: 1px solid black;border-left: 1px solid black;">
              {{$value->code}}
            </td>
          </tr>

      </tbody>
      </table>
  </div>
  <div style="text-align:center;padding:10px 40px;">
    <br>
    <br>
    <p style="text-align: center;"><span style="border-top: 2px dotted black;padding: 0px 60px;float:left;">HOD</span> <span style="border-top: 2px dotted black;padding: 0px 60px;float:right;">REGISTRAR</span></p>
    <p style="clear:both;"></p>
    <br>
    <br>
    <p style="text-align: center;"><span style="border-top: 2px dotted black;padding: 0px 40px;float:left;">COORDINATOR'S SIGNATURE</span>  <span style="border-top: 2px dotted black;padding: 0px 40px;float:right;">STUDENT'S SIGNATURE</span></p>
  </div>
  </body>
</html>
