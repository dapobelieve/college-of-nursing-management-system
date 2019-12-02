@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Application Guide")

@section('pagename')
Application Guide
@stop

@section('site.content')

<section class='admission_form'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12 my-5'>
                        <h2>Application for Admission - Step One</h2>
                    </div>
                </div>
    <form id='admissionform'>
                        <div class='row'>
                            <div class='col-md-6'>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            First name</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='first_name' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Surname</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='surname' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Email address</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='email' name='email' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Alternative Email address</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='email' name='email_alt' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Phone</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='phone' class='form-control'>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Alternative Phone number</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='phone_alt' class='form-control'>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Date of birth </label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='date' name='dob' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Home Address</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <div class='form-group'>
                                            <input type='text' name='home_address' class='form-control' placeholder='City' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Country</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <div class='form-group'>
                                            <input type='text' name='address_country' class='form-control' placeholder='City' required>
                                        </div>
                                    </div>
                                </div>





                            </div>
                            <div class='col-md-6'>


                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            State</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <div class='form-group'>
                                            <input type='text' name='address_state' class='form-control' placeholder='City' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Local Government Area of Residence</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <div class='form-group'>
                                            <input type='text' name='address_lga' class='form-control' placeholder='City' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Nationality</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='nationality' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            State of Origin</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='state_of_origin' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Local Government Area</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='lga' class='form-control' required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Gender</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='gender' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='male'>Male</option>
                                            <option value='female'>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Religion</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='religion' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='christianity'>Christianity</option>
                                            <option value='islam'>Islam</option>
                                            <option value='other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Marital Status</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='marital_status' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='single'>Single</option>
                                            <option value='married'>Married</option>
                                            <option value='divorced'>Divorced</option>
                                            <option value='other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Date of Birth</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='date' name='date_of_birth' class='form-control' required>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12 text-center'>
                                <button type='submit' class='btn btn-default btn-courses mt-4' id='js-admission-btn'>Save</button>
                            </div>

                            <div class='col-md-12'>
                                <div id='js-admission-result' data-success-msg='Success, Your application has been sent' data-error-msg='Oops! Something went wrong'></div>
                                <!-- // end #js-admission-result -->
                            </div>
                        </div>
                    </form>
					<div class='row'>
						<div class='col-md-12 text-center'>
						<button class='btn btn-default btn-courses mt-4' id='js-admission-2'>Proceed</button>
						</div>
					</div>
                </div>
            </section>

@stop
@section('site.scripts')
<script>

      $(document).ready(function(){
          $('#js-admission-2').hide();
          
      });

</script>
@stop
