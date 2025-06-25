@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Application Guide")

@section('site.styles')
<style>
.printable { display:none; }
@media only print {
    .container { display:none !important; };
    .printable { display:block !important; } ;
}
</style>
@stop

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
                  This is a four year (4) programme commencing from October, 2024, after which candidates will be presented for both the College and the Nursing and Midwifery Council of Nigeria (NMCN) Final Qualifying Examinations to qualify as General Nurses and be eligible for registration with NMCN as Registered Nurses (RN).
                  </p>
            </div>
            <div class="col-md-5 admission-form_mr">

                <ul class="admission-form_listed">
                  <strong>Requirements</strong>
                    <p>Applicant must:</p>
                    <li>1.	JAMB: Candidates must have scored not less than 200 in the JAMB Result choosing OYSCONME as their Choice of Institution.</li>
                    <li>2.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits at more than
                      two (2) sittings in English Language, Mathematics, Physics, Chemistry and Biology</li>
                    <li>3.	Only individuals with required credit passes, not more than two (2) sittings form the same examination body may apply.
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
                <p>This is a three year (3) programme commencing from April, 2024, after which candidates will be presented for both the College and the Nursing and Midwifery Council of Nigeria (NMCN) Final Qualifying Examinations to qualify as Midwives and be eligible for registration with NMCN as Registered Midwife (RM).</p>
            </div>
            <div class="col-md-5 admission-form_mr">
              <ul class="admission-form_listed">
                <strong>Requirements</strong>
                  <p>Applicant must:</p>
                    <li>1.	Possess WAEC/SSCE/GCE or NECO/SSCE/GCE with at least five (5) credits (at not more than
                    two (2) sittings) in English Language, Mathematics, Physics, Chemistry and Biology</li>
                  <li>2.	Only individuals with required credit passes at not more than two (2) sittings form the same examination body may apply.
                     He or She should be at least Seventeen (17) years old on admission.</li>
              </ul>
            </div>
        </div>

      <hr>
      <!--<div class="row">
          <div class="col-md-7 admission-form_mr">
            <br>
            <br>
            <br>
              <h4><strong>Post Basic Midwifery</strong></h4>
              <br>
              <p>This is an eighteen (18) months programme commencing in September, 2021. </p>
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
      </div>-->
        <hr>
        <div class="row">
          <div class="col-md-12">
              <strong><p class="text-center"><b>Method of Application</b></p></strong>
            <p class="text-justify">Interested candidates are to follow the underlisted process for online application through the college website: <a href="/">www.oysconme.edu.ng</a></p>
            <ul>
              <li>Online payment with the sum of Fifteen Thousand (N20,500.00) via this <a href="/admission/appform">link</a> where application form fee is expected to be made.</li>
              <li>Pin generated after payment should be printed out</li>
              <li>After generating the pin, a <a href="#">link</a> will direct you to the page where you complete your application</li>
              <li>Photocard must be printed out by the applicant, which is expected to be brought to the College for endorsement</li>
              <li>Alternatively, you may wish to come to the College ICT Centre with your ATM card for their online payment, if you find the process cumbersome. </li>
            </ul>
            <!--<p class="text-justify">A sum of non-refundable fee of Ten Thousand Naira (₦10,000.00) to be paid by candidates for the Computer Assisted Screening. The fee covers Two Thousand Naira (₦2,000.00) for Post UTME, Seven Thousand Naira (₦7,000.00) for verification of SSCE, WAEC or NECO as applicable per sitting and One Thousand Naira (₦1,000.00) for online payment transaction.</p>  -->          
          </div>
        </div>

      <div class="row">
        <div class="col-md-12">

            <strong><p class="text-center">Closing Date For Basic Midwifery</p></strong>
          <p class="text-justify">Online application must be completed on or before Friday 10th January 2025.</p>
          <ul>
            <li>Date of Entrance Examination (CBT): Tuesday 21st to Thursday 23rd January 2025.</li>
            <!--<li>Date of Interview: Monday, 29th April and Tuesday, 30th April, 2024</li>-->
            <li>Venue: Oyo State College of Nursing and Midwifery, Eleyele, Ibadan and KISHI</li>
            <li>Time: 8.00 am prompt</li>
            <li>Resumption Date: as fixed by Nursing and Midwifery Council slated for Monday 3rd March 2025.</li>
          </ul>
          <br>

           <!-- <strong><p class="text-center"><b>COMPUTER ASSISTED SCREENING (CAS)</b></p></strong>
         <p class="text-justify">Computer Assisted Screening date is:</p>
          <ul>
            <li>Date: From Monday, 28th August to Thursday, 31st August, 2023</li>
            <li>Venue: OYSCONME Premises</li>
            <li>Time: 8.00 am prompt</li>
          </ul>
        <p>Successful candidates would be required to pay a non-refundable Acceptance Fee of Forty Thousand Naira (₦40,000.00) only.</p>-->

         
         <h3>Please note: </h3>
          <ul>
            <li><strong>This advert disclaims all other calls for application into the Oyo State College of Nursing and Midwifery, ELeyele, Ibadan.</strong></li>
            <li><b>that applicants are not expected to pay into individual accounts, online account such as Opay, Palmpay or Moniepoint.</b></li>
            <li><b>Beware of Fraudsters!!!  </b></li>
          </ul>
          
          <p>For further enquiries, please contact the Office of the Registrar or Heads of Department of Nursing and Midwifery respectively.</p>
          <strong>Contact Numbers:</strong>
          <ul>
            <li>09138766976</li>
            <li>08156903399</li>
          </ul>
        </div>
      </div>
      <p class="text-center"> <strong>Signed</strong> <br> Raji, T. A (Mr.) <br> Ag. Registrar </p>
      <div class="row">
        <div class="col-sm-4">

        </div>
        <a href="{{asset(route('invoice.activate'))}}" class="col-md-6"><button type="button" class="btn btn-info" name="button">Click here to start application</button></a>
      </div>

    </div>

</section>
<!--//END ADMISSION FORM RULES -->

@stop

@section('site.scripts')
<script type="text/javascript">
 document.oncontextmenu = new Function("return false");

 $(document).ready(function() {
 $('body').bind('cut copy paste', function(event) {
 event.preventDefault();
 });
 });
 </script>
@stop
