<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
              }
    </style>
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
      <h2 style="text-decoration: underline;text-align: center; clear:both;">RecruitmentList</h2>
    </div>
    <div style="text-align:center;padding:5px 5px;font-size:7px;">
      <table>
        <tbody>
          <tr>
            <th>Fullname</th>
            <th>sex</th>
            <th style="padding:8px 20px;">DoB</th>
            <th>phone</th>
            <th>LGA</th>
            <th>Address</th>
            <th>Position</th>
            <th>passport</th>
            <th>degree</th>
            <th>major</th>
            <th>degree2</th>
            <th>major2</th>
          </tr>


          @foreach($applicants as $data)


          <tr>
            <td>{{$data->full_name}}</td>
            <td>{{strtolower($data->sex)}}</td>
            <td>{{date("d-M-y",strtotime($data->dob))}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->lga}}</td>
            <td>{{strtolower($data->address)}}</td>
            <td>{{$data->position}}</td>
            <td> <img src="{{$data->pic_url}}" alt="" width="70" height="60"> </td>
            @foreach($data->education as $edu)
            <td>{{$edu->certified}}</td>
            <td>{{$edu->major}}</td>

            @endforeach
          </tr>

          @endforeach
        </tbody>
      </table>


  </div>
  </body>
</html>
