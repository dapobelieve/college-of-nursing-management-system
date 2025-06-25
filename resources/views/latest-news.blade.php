@extends('welcome')

@section('title', strtoupper(config('site.name.short'))." "." | News")

@section('pagename')
NEWS
@stop

@section('site.content')

<section class="events">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="event-title">News</h2>
            </div>
            <div class="col-md-8">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item nav-tab1">
                        <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events" role="tab">Latest News </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
           <!-- Tab panes -->
           <div class="tab-content">
             <div class="tab-pane active" id="upcoming-events" role="tabpanel">

                   <div class="col-md-12">
                     <div class="row">
                           <div class="col-md-2">

                           </div>
                           <div class="col-md-10">
                               <div class="event-heading">
                                   <h3>{{$latestNews->title}}</h3>
                               </div>
                               <div id="collapse" class="panel-collapse collapse in show">
                                   <div class="panel-body">
                                     <div class="event-hilights">
                                          @if($locate != null) <h5>Event Photo</h5>@endif
                                       </div>
                                       <div class="row">
                                           <div class="col-md-4">
                                             @if($locate != null)
                                             <img src="{{$locate->url}}" class="img-fluid" alt="event-img">
                                             @endif
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-10">
                                               
                                                   <div class="text-justify">{!!$latestNews->rich_body!!}</div>
                                               </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="panel-heading">
                                   <h4 class="panel-title">
                                     <a data-toggle="collapse" class="event-toggle" data-parent="#accordion" href="#collapse">Hide Details</a>
                                 </h4>
                             </div>
                         </div>
                     </div>
                     <hr class="event-underline">
                  </div>
              </div>
            </div>
          </div>
      </div>
    </section>

@stop
