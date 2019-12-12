@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Application Guide")

@section('pagename')
Application Guide
@stop

@section('site.content')

<!--============================= ADMISSION FORM RULES =============================-->
<section class="admission-form_rules">
    <div class="container">
        <div class="row">
            <div class="col-md-7 admission-form_mr">
                <h2>Admission Requirements</h2>
                <br>
                <br>
                <br>
                <h4><strong>Basic General Nursing</strong></h4>
                <br>
                <p>
                  Basic General Nursing is a three year programme , after which candidates will be presented for both the College
                   and the Nursing and Midwifery Council of Nigeria (NMCN) Final Qualifying Examinations
                   to qualify as General Nurses and be eligible for registration with NMCN as Registered Nurses (RN).
                  </p>
            </div>
            <div class="col-md-5 admission-form_mr">

                <ul class="admission-form_listed">
                  <strong>Requirements</strong>
                    <p>Applicant must:</p>
                    <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at more than
                      two (2) sittings in English Language, Mathematics, Physics, Chemistry and Biology</li>
                    <li>2.	Only individuals with required credit passes at not more than two (2) sittings form the same examination body may apply.
                       He or She should be at least Seventeen (17) years old on admission.</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-7 admission-form_mr">
              <br>
              <br>
              <br>
                <h4><strong>Basic Midwifery</strong></h4>
                <br>
                <p>Basic Midwifery is a three year programme, after which candidates will be presented for both the College and
                  the Nursing and Midwifery Council of Nigeria (NMCN) Final Qualifying Examinations
                  to qualify as General Nurses and be eligible for registration with NMCN as Registered Nurses (RN).</p>
            </div>
            <div class="col-md-5 admission-form_mr">
              <ul class="admission-form_listed">
                <strong>Requirements</strong>
                  <p>Applicant must:</p>
                  <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at more than
                    two (2) sittings in English Language, Mathematics, Physics, Chemistry and Biology</li>
                  <li>2.	Only individuals with required credit passes at not more than two (2) sittings form the same examination body may apply.
                     He or She should be at least Seventeen (17) years old on admission.</li>
              </ul>
            </div>
        </div>

        <hr>
      <div class="row">
          <div class="col-md-7 admission-form_mr">
            <br>
            <br>
            <br>
              <h4><strong>Post Basic Midwifery</strong></h4>
              <br>
              <p>This is  eighteen (18) month programme. After the completion of the programme candidates will be presented for
                both the Nursing and Midwifery Council of Nigeria (NMCN) Final
                Qualifying Examinations to qualify as
                 General Nurses and be eligible for registration with NMCN as Registered Nurses (RN).</p>
          </div>
          <div class="col-md-5 admission-form_mr">
            <ul class="admission-form_listed">
              <strong>Requirements</strong>
                <p>Applicant must:</p>
                <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at
                   more than two (2) sittings in English Language, Mathematics, Physics, Chemistry and Biology.</li>
                <li>2.	Be a Registered Nurse (RN) with the Nursing and Midwifery Council of Nigeria.
                  Applicants awaiting the result of Nursing and Midwifery Council of
                  Nigeria Examination may also apply.</li>
            </ul>
          </div>
      </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
              <strong><p class="text-center">Method of Application</p></strong>
            <p class="text-justify">Interested candidates for Basic Midwifery programme are expected to visit
              the main campus at Eleyele and also kishi campus to obtain a scratch card to
              start registration process after which  payment of Ten Thousand five hundred Naira
              (#10,500.00) only can be made online while those who choose to pay through banks will pay the
              sum of Ten Thousand (#10,000)Naira only to the College Account Number: 0123032629.
              Bank Name: Wema Bank Plc. Account Name: Oyo State College of Nursing and Midwifery,
              Eleyele, Ibadan and sum of Two Hundred Naira (#200.00) only to Nursing and Midwifery
               Council of Nigeria, Oyo State Chapter Account Number: 2019704292 at any First Bank Plc.</p>
          </div>
        </div>
      <div class="row">
        <div class="col-md-5">

        </div>
        <a href="{{route('admission.login')}}" class="col-md-6"><button type="button" class="btn btn-info" name="button">Click here to apply</button></a>
      </div>

    </div>

</section>
<!--//END ADMISSION FORM RULES -->

@stop
