@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Course details")


@section('pagename')
Events
@stop

@section('site.content')

<!--============================= ADMISSION DETAILS COURCES =============================-->
<section class="admission_cources">
  <div class="container">
      <div class="row text-center">
          <div class="col-md-12">
              <h2>{{$dept->name}}</h2>
              <p class="mb-4">Welcome to the {{$dept->name}} department where we give quality health care</p>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <img src="{{asset('images/admission-detail/admission-detail_img.jpg')}}" class="img-fluid" alt="#">
          </div>
      </div>
      <div class="row justify-content-md-center">
          <div class="col-lg-6">
              <div class="admission_discription">
                  <h4>{{$dept->name}}</h4>
                  <div class="star-rating">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                  <!-- // end .star-rating -->
                  <p>{{$dept->description}}</p>
                  </div>
              <div class="admission-pdf">
                  <i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>
                  <p>course details PDF
                      <br>
                      <a href="#">DOWNLOAD</a>
                  </p>
                  <a href="#" class="btn btn-warning btn-pdf_join">Join this course</a>
              </div>
                  </div>
                  <div class="col-lg-4">
                      <ul class="admission_rating">

                          <li>Duration<span>:</span></li>
                          @if($dept->name == 'Basic Midwifery' or $dept->name == 'Post Basic Midwifery')
                          <li class="admission_star">18 months</li>
                          @else
                          <li class="admission_star">3 years</li>
                          @endif
                          <li>Fees<span>:</span></li>
                          <li class="admission_star">Contact us</li>
                          <li>Seats available<span>:</span></li>
                          <li class="admission_star">Ready</li>
                      </ul>
                      <div class="admission_insruction">
                          <h4>HOD</h4>
                          <img src="{{asset('images/'.$dept->name)}}.jpg" class="img-fluid" alt="#">
                          <p>{{$dept->hod}}
                              <br>
                              <span>Head of Department</span></p>
                          </div>
                          <div class="admission_share-icon">
                              <h4>Share Course</h4>
                              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                              <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!--//END ADMISSION DETAILS COURCES -->
@stop
