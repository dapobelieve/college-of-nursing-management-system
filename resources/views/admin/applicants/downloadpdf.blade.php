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
                <br>
      <h2 style="text-decoration: underline;text-align: center; clear:both;">Examination List</h2>
    </div>
    <div style="text-align:center;padding:10px 40px; border-style: solid; border-width: 2px;">
      <table>
        <tbody>

          @foreach($applicants as $data)


          <tr>
            <td style="border: 2px solid black; padding-top: 3px;"><b>Exam Number: </b> {{$data->cardapplicant->reg_no}}
               <br>
               <b>Fullname: </b> {{$data->surname.", ".$data->first_name." ".$data->middle_name}}
               <br>
                <label for="">Present: </label> <div style="padding-top:2px">Yes: <input type="checkbox" name="" value="" > No: <input type="checkbox" name="" value="" > </div>

             </td>
            <td> <img src="{{$data->pic_url}}" alt="" width="100" height="100"> </td>
          </tr>

          @endforeach
        </tbody>
      </table>
  </div>
  </body>
</html>
