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

    <table width="100%">
  <tr>
    <td width="100">
      <img src="{{ asset('images/Oysconmetrans.png') }}" height="100" width="100" alt="logo">
    </td>
    <td style="text-align: center;">
      <h3>OYO STATE COLLEGE OF NURSING AND MIDWIFERY,<br>ELEYELE IBADAN, OYO STATE.</h3>
    </td>
  </tr>
</table>

<h2 style="text-align: center; text-decoration: underline;">Examination List</h2>

<div style="text-align:center;padding:10px 40px; border: 2px solid;" class="content">
  <table width="100%" cellspacing="0" cellpadding="5">
    <tbody>
      @foreach($applicants as $data)
        <tr>
          <td style="border: 2px solid black;">
            <b>Exam Number:</b> {{ $data->cardapplicant->reg_no ?? 'N/A' }}<br>
            <b>Fullname:</b> {{ $data->surname }}, {{ $data->first_name }} {{ $data->middle_name ?? '' }}<br>
            <label>Present:</label> Yes: □ No: □
          </td>
          <td>
            <img src="{{$data->pic_url}}" alt="" width="100" height="100">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

  </body>
</html>
