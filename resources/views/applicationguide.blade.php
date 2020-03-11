@extends('welcome')

@section('title')
Admission List
@stop

@section('pagename')
Admission List
@stop

@section('site.content')
<br>
<div class="container">
  <div class="row">
    <h3><b>2020 ENTRANCE EXAMINATION RESULT OF THE SCHOOL OF BASIC MIDWIFERY, KISHI</b></h3>
    <p>The underlisted candidates who were at the recently conducted entrance examination and interview into the School of Basic Midwifery, Kishi have been offered Admission into Basic Midwifery programme of the Institution</p>

    <table class="table table-striped table-sm">
  <thead class="thead-info">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Reg No.</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $key => $stud)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$stud->cardapplicant->reg_no}}</td>
      <td>{{$stud->surname.", ".$stud->first_name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

  </div>
  <div class="row">
    <p class="text-justify"><strong>1) The resumption date for the Basic Midwifery Programme is Sunday, 1st March, 2020. Successful candidates who are on the merit list are to report at the office of the Registrar, Oyo State College of Nursing and Midwifery, Eleyele, Ibadan from 8:00am to 4:00pm to collect their admission letter,
      but must have paid the sum of Fifteen Thousand Naira (N15,000:00) only as Acceptance Fee. <a href="{{asset('admission/login')}}">click here</a> to login and pay </strong></p>
      <p><strong>2) Process of the online acceptance payment is as follows:</strong></p>
      <ul>
        <li>The Scratch card obtained during the registration process will be used to access the admission portal</li>
        <li>Your registration and pin number on your scratch card will be used to login to pay the Acceptance fee</li>
        <li>Once you make the online payment, make sure you print out the Acceptance Payment Receipt</li>
        <li>Acceptance payment receipt will be used to collect Admission Letter from the office of the Registrar</li>
        <li>Candidates are expected to pay the Acceptance Fee on or before Friday, 13th March, 2020 </li>
      </ul>

    <p class="text-justify">  <strong>2) Details of the School Fee will be stated and attached to the Admission Letter for each candidate</strong></p>

    <p class="text-justify">  <strong>3) For further enquires, please visit the Admission Office or the Registrar office or call 09096943713</strong></p>

  </div>
  <p class="text-center"> <strong>Signed</strong> <br> Z.O Jayeola <br> Ag. Registrar </p>
</div>
@stop
