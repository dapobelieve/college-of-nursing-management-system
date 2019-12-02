@extends('welcome')
@section('title',  config('site.name.long'))
@section('site.content')
    <!--============================= ABOUT =============================-->
    <section class="clearfix about about-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>Welcome</h2>
                    <p>It is my privilege to welcome the aspiring and returning students to Oyo State College of Nursing and Midwifery, Eleyele, Ibadan, Nigeria which has created its own fame during the last 7 decades. Oyo State College of Nursing and Midwifery Eleyele, Ibadan ensures high quality professional education through various innovative programmes keeping ‘A’ grade in position among other colleges of Nursing in Nigeria. The College has a long history of providing quality nursing education fostered by visionary and committed leadership. I feel honoured to be given the opportunity to lead the College in this phase of its development.</p>
                    <a href="{{ url('/provost-statement') }}">
                        <button type="button" class="btn btn-outline-dark">Read More</button>
                    </a>
                </div>
                <div class="col-md-4">
                    <img src="images/provost1.jpg" class="img-fluid about-img" alt="#">
                </div>
            </div>
        </div>
    </section>
    <!--//END ABOUT -->
    <!--============================= OUR COURSES =============================-->
    <section class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Courses</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($department as $dept)

                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="courses_box mb-5">
                            <div class="course-img-wrap">
                                <img src="images/courses_1.jpg" class="img-fluid" alt="courses-img">
                                <div class="courses_box-img">
                                    <div class="courses-link-wrap">
                                        <a href="#" class="course-link"><span>course Details </span></a>
                                        <a href="#" class="course-link"><span>Join today </span></a>
                                    </div>
                                    <!-- // end .courses-link-wrap -->
                                </div>
                            </div>
                            <!-- // end .course-img-wrap -->
                            <div class="courses_icon">
                                <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
                            </div>
                            <a href="course-detail.html" class="course-box-content">
                                <h3>{{$dept->name}}</h3>
                                <p>Know more about our {{$dept->name}} department</p>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-default btn-courses">View all courses</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END OUR COURSES -->
    <!--============================= EVENTS =============================-->
    <section class="event">
        <div class="container">
            <div class="row">
                @if(!$UpcomingEvent)
                    <div class="col-lg-6">
                        <h2>No upcoming event</h2>
                    </div>
                @else
                    <div class="col-lg-6">
                        <h2>Upcoming Events</h2>
                        <div class="event-img">
                            <span class="event-img_date">{{date("d-m-y",strtotime($UpcomingEvent->expiry_date))}}</span>
                            <img src="images/upcoming-event-img.jpg" class="img-fluid" alt="event-img">
                            <div class="event-img_title">
                                <h3>{{$UpcomingEvent->title}}</h3>
                                <p>{{$UpcomingEvent->details}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-6">
                    <h2>COLLEGE NEWS</h2>
                    <div class="event-date-slide">
                        @if($latestNews->isEmpty())
                            <h3>No news available at the moment</h3>
                            @else
                            <?php $j = 1;
                            $k =0;
                            $leng = (count($latestNews));
                            $length = ceil((count($latestNews))/2);?>
                            @for($i = 0; $i< $length; $i++)
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="event_date">
                                        <div class="event-date-wrap">
                                            <p></p>
                                            <span>NEWS</span>
                                        </div>
                                    </div>
                                    <div class="date-description">
                                        <h3>{{$latestNews[$i + $k]->title}}</h3>
                                        <p>{{substr($latestNews[$i + $k]->content,0,100)}}..</p>
                                        <a href="{{route('latestNews', ['id'=>$latestNews[$i + $k]->id, 'info'=>$latestNews[$i + $k]->title])}}">Read More</a>
                                        <hr class="event_line">
                                    </div>
                                    @if(($i+$j)
                                    < $leng) <div class="event_date">
                                        <div class="event-date-wrap">
                                            <p></p>
                                            <span>NEWS</span>
                                        </div>
                                    </div>
                                    <div class="date-description">
                                        <h3>{{$latestNews[$i + $j]->title}}</h3>
                                        <p>{{substr($latestNews[$i + $j]->content,0,100)}}..</p>
                                        <a href="{{route('latestNews', ['id'=>$latestNews[$i + $j]->id, 'info'=>$latestNews[$i + $j]->title])}}">Read More</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <?php
                            $j++;
                            $k++;
                            ?>
                            @endfor @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END EVENTS -->
    <!--============================= DETAILED CHART =============================-->
    @include('layouts._stats')
@stop

@section('site.scripts')
    <script>
        $(document).ready(function(){
            $(function () {
                var lastScrollTop = 205;

                $(window).scroll(function(event){

                    var st = $(this).scrollTop();
                    if (st > lastScrollTop ) {
                        $('#scroll').show()

                    } else {
                        $('#scroll').hide()

                    }
                    lastScrollTop = 205;
                });
            });
        });

    </script>
@stop