@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Course details")


@section('pagename')
Job Application Guide
@stop

@section('site.content')
<div class="container">

  <div class="row">

    <h5 class="text-center text-danger" style="padding:20px;">OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN <br>INTERNAL AND EXTERNAL ADVERTISEMENT OF VACANCIES.
</h5>
    <p class="text-primary">Sequel to the approval of His Excellency, the Governor, Engr. Seyi Makinde, the Management of Oyo State College of
      Nursing and Midwifery hereby announces the process of filling the following vacant positions of Tutors
       and Administrative staff. Applications are therefore invited from suitably qualified candidates who meet
       the criteria as stated below:</p>

       <ul>
         <li>NURSE TUTOR <br> <b>Qualification:</b> To qualify for the position of Nurse Tutor, the candidate must: <br>
            i.	have obtained a degree in Nursing plus the Registration of the Nursing and Midwifery Council of Nigeria (NMCN) as a Registered Nurse Educator (RNT);
            ii.	M.Sc. degree in Medical Surgical Nursing will be an added advantage
          </li>
          <br>
          <li>MIDWIFE TUTOR<br> <b>Qualification:</b>
               To qualify for the position of Midwife Tutor, the candidate must:
              i.	have obtained a degree in Nursing plus the Registration of the Nursing and Midwifery Council of Nigeria (NMCN) as a Registered Nurse/Midwife Educator;
              ii.	M.Sc degree in Maternity and Child Health Nursing will be an added advantage.
          </li>
          <br>
          <li>COMMUNITY MIDWIFE TUTOR<br> <b>Qualification:</b>
             To qualify for the position of Community Midwife Tutor, the candidate must:
               i.	have obtained a degree in Nursing plus the Registration of the Nursing and Midwifery Council of Nigeria (NMCN) as Registered Nurse/Midwife Educator;
              ii.	Registered Public Health Educator can also apply;
             iii.	M.Sc degree in Maternity and Child Health Nursing will be an advantage.
            </li>
            <br>
            <li>HIGHER EXECUTIVE OFFICER (GD) <br> <b>Qualification:</b>
              To qualify for the position of Higher Executive Officer (GD) candidate must:
              i.	have obtained First Degree in Social Sciences, Humanities or Higher National Diploma (HND) in Business Administration from a recognized Institution.
              </li>
              <br>
              <li>HIGHER EXECUTIVE OFFICER (ACCOUNTS) <br> <b>Qualification:</b>
               To qualify for the post of Higher Executive Officer              (Accounts) candidate must:
                i.	have obtained B.Sc in Accountancy or Higher National Diploma       (Accountancy) from a recognized Institution.
                </li>

       </ul>

       <p class="text-primary">Applicants should give name of three (3) referees at least two (2) should be competent to attest to the
         candidate’s professional/academic standing and
         character. Candidates should request their referees to send their confidential reports direct to the address above.</p>

         <p class="text-danger">Please note that only shortlisted candidate will be contacted.</p><br>

         <p class="text-center"> <strong>Signed</strong> <br> Z.O Jayeola <br> Ag. Registrar </p>
         <div class="row">
           <div class="col-sm-4">

           </div>
           <a href="{{asset(route('employment.index'))}}" class="col-md-6"><button type="button" class="btn btn-info" name="button">Click here to start application</button></a>
         </div>

  </div>

</div>


@stop
