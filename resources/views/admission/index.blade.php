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
                  Basic General Nursing is a three year programme commencing from October 2020 , after which candidates will be presented for both the College
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
                  <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at not more than
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
              <p>This is  eighteen (18) month programme commencing from September, 2020. </p>
          </div>
          <div class="col-md-5 admission-form_mr">
            <ul class="admission-form_listed">
              <strong>Requirements</strong>
                <p>Applicant must:</p>
                <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at not
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
            <p class="text-justify">Interested candidates are to follow the underlisted process for online application:</p>
            <ul>
              <li>Online payment with the sum of Ten Thousand, Five Hundred Naira (N10,500.00) via this <a href="#">link</a> is expected to be made.</li>
              <li>Pin generated after payment should be printed out</li>
              <li>After pin generation, a <a href="#">link</a> will direct you to the page where you complete your application process</li>
              <li>Photo card to be printed out by the applicant which is expected to be brought on the examination day</li>
              <li>Alternatively, you may wish to come to the College ICT Room with your Debit Card for registration, if you find the process listed above difficult to do. </li>
            </ul>
          </div>
        </div>

      <div class="row">
        <div class="col-md-12">
            <strong><p class="text-center">Closing Date:</p></strong>
          <p class="text-justify">Online application must starts 9th March, 2020 and must be completed on or before 15th June, 2020</p>
          <ul>
            <li>Date of Entrance Examination (CBT): Tuesday, 16th June – Thursday, 18th June, 2020.</li>
            <li>Date of Interview: Monday, 29th June – Friday, 3rd July, 2020.</li>
            <li>Venue: Oyo State College of Nursing and Midwifery, Eleyele, Ibadan</li>
            <li>Time: 8.00 am prompt</li>
          </ul>
          <p>For further enquiries, please contact the Office of the Registrar or Heads of Department of Nursing and Midwifery respectively.</p>
          <strong>Contact Numbers:</strong>
          <ul>
            <li>09096943713</li>
            <li>08063258781</li>
            <li>08073864856</li>
          </ul>
          <b>Note: No payment to any Individual/Agent or Personal Bank Account. All payment should be done via the school website
          <br>Thank You. </b>
        </div>
      </div>
      <p class="text-center"> <strong>Signed</strong> <br> Z.O Jayeola <br> Ag. Registrar </p>
      <div class="row">
        <div class="col-sm-4">

        </div>
        <a href="{{asset(route('invoice.activate'))}}" class="col-md-6"><button type="button" class="btn btn-info" name="button">Click here to start application</button></a>
      </div>

    </div>

</section>
<!--//END ADMISSION FORM RULES -->

@stop
