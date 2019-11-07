@extends('layout')

@section('title')
Event / OYSCONME
@stop

@section('pagename')
Events
@stop

@section('content')

<section class="events">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="event-title">Events</h2>
            </div>
            <div class="col-md-8">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item nav-tab1">
                        <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events" role="tab">Upcoming events </a>
                    </li>
                    <li class="nav-item nav-special-br">
                        <a class="nav-link tab-list" data-toggle="tab" href="#completed-events" role="tab">Completed events </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link tab-list" data-toggle="tab" href="#calander-view" role="tab"> Calander view </a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row">
           <!-- Tab panes -->
           <div class="tab-content">
             <div class="tab-pane active" id="upcoming-events" role="tabpanel">
               @if($UpcomingEvent->isEmpty())
               <p class="text-justify">No event available!!!</p>
               @endif
             @foreach($UpcomingEvent as $event => $value)
              <?php $num = $event +1; ?>

                   <div class="col-md-12">
                     <div class="row">
                           <div class="col-md-2">
                               <div class="event-date">
                                   <h4>{{date("d",strtotime($value->expiry_date))}}</h4> <span>{{date("M-Y",strtotime($value->expiry_date))}}</span>
                               </div>
                               <span class="event-time">9.00 AM - 4.00 PM</span>
                           </div>
                           <div class="col-md-10">
                               <div class="event-heading">
                                   <h3>Event Heading</h3>
                                   <p>{{$value->title}}</p>
                               </div>
                               <div id="collapse{{$num}}" class="panel-collapse collapse in show">
                                   <div class="panel-body">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="event-highlight-discription">
                                                   <p>{{$value->details}}</p>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="panel-heading">
                                   <h4 class="panel-title">
                                     <a data-toggle="collapse" class="event-toggle" data-parent="#accordion" href="#collapse{{$num}}">Hide Details</a>
                                 </h4>
                             </div>
                         </div>
                     </div>
                     <hr class="event-underline">
                  </div>
              @endforeach
              </div>

<!-- to show completed event-->
          <div class="tab-pane" id="completed-events" role="tabpanel">
              @foreach($CompletedEvent as $event => $value)
               <?php $num = $event +1; ?>

                    <div class="col-md-12">
                      <div class="row">
                            <div class="col-md-2">
                                <div class="event-date">
                                    <h4>{{date("d",strtotime($value->expiry_date))}}</h4> <span>{{date("M-Y",strtotime($value->expiry_date))}}</span>
                                </div>
                                <span class="event-time">9.00 AM - 4.00 PM</span>
                            </div>
                            <div class="col-md-10">
                                <div class="event-heading">
                                    <h3>Event Heading</h3>
                                    <p>{{$value->title}}</p>
                                </div>
                                <div id="collapse{{$num}}" class="panel-collapse collapse in show">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="event-highlight-discription">
                                                    <p>{{$value->details}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                      <a data-toggle="collapse" class="event-toggle" data-parent="#accordion" href="#collapse{{$num}}">Hide Details</a>
                                  </h4>
                              </div>
                          </div>
                      </div>
                      <hr class="event-underline">
                   </div>
               @endforeach
              </div>
              <!-- to show calender-->
              <div class="tab-pane" id="calander-view" role="tabpanel">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>

@stop
