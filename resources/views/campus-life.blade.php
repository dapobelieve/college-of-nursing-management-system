@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | Campus Life")


@section('pagename')
Campus Life
@stop

@section('site.content')

<section class="blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="blog-category_block pt-0">
                    <h3>Sections</h3>
                    <ul class="" role="tablist">
                        <li class="nav-item nav-tab1"> <a class="nav-link tab-list active " id="cham" href="#school-version" >Amazing experience in OYSCONME<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        <li class="nav-item nav-tab1"> <a class="nav-link tab-list" id="chan" data-toggle="collapse" aria-expanded="false" href="#sug-version" >SUG views about the campus  <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
              <div class="" id="school-version">
                <img src="images/campus-life.jpg" class="img-fluid mb-4" alt="img">
                <p>Oyo State College of Nursing and Midwifery has an outstanding reputation of excellence in
                  education and positive student experience. This is because we focus on delivering best student
                   support.</p>
                   <p> At OYSCONME, we offered safe and secure accommodations with close proximity to classrooms.
                     We have over 200 rooms in about 7 halls of residences within the College premises for both
                     freshers and stallites.</p>

                <blockquote class="blogpost-quotes mb-4">
                    <span><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                    <p> All the rooms are well equipped with adequate ventilations to make
                    students stay within the college a memorable one. </p>
                    <span class="quote-right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                </blockquote>
                <p>The students have a Student Union Government
                 which is saddled with responsibilities of welfarism. They choose their leadership through
                 democratic means. Student Union activities range from organizing Nurses Weeks,
                 Fresher   orientations programme and press clubs.</p>
                <p>There are relaxations spots such as cafeteria and talk shops where students get refreshed with a token.
                  The guidance and counseling unit is there to help the students sort out there psychological
                   needs and the doors is always open for talk on issues that is bothering the students minds.</p>
                  <p>Religious activities within the College are at the highest as both the Christians and Muslims observe their religious beliefs without hindrances.
                  </p>

                <div class="blog-icons">
                    <div class="blog-share_block">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li>Share :</li>
                        </ul>
                    </div>
                </div>
                </div>

              <div class="collapse" id="sug-version">
                <img src="images/campus-life2.jpg" class="img-fluid mb-4" alt="img">
                <h5>Hmmm…… Life in the College of “recent” has been great.</h5>
                <p>Flash back to when I got admitted into the College; it was a war between me and the
                  environment, my adaptative ability was put to use ensuring a state of homeostasis.</p>
                  <p>The College has been a place where future leaders are groomed both physically, mentally,
                     socially and even spiritually. The College administrators have put to god use their
                     governing ability, ensuring that all students enjoy an atmosphere conducive for learning.
                    The academic activities on the campus has been top notched and fun filled  though we have
                    lecturers who are strict but also they are all competent ensuring that all
                    students enjoy their teaching.     </p>
                   <p> The college I joined has participated in several literary and debating competitions
                     and has always been a champion.
                      In the field of sport, the College has experience upturn in its fortune with the
                      anticipation of NISONMG which bring together all nursing schools in the South-West together. The College has participated in several activities where lots of laurels were won.

                      </p>

                <blockquote class="blogpost-quotes mb-4">
                    <span><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                    <p> Let’s keep the flag flying until the peak is achieved…….</p>
                    <span class="quote-right"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                </blockquote>
                <p class="text-md-right">STN Ayinde Victor</p>

                <div class="blog-icons">
                    <div class="blog-share_block">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li>Share :</li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>


        </div>
    </div>
</section>

@stop

@section('site.scripts')
<script>
$('#chan').click(function(){
  $('#school-version').hide();
  $('#sug-version').show();
});

$('#cham').click(function(){
  $('#sug-version').hide();
  $('#school-version').show();
});
</script>

@stop
