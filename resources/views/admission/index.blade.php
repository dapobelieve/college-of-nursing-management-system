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
                <h2>Admission Rules</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. It has survived not only five centuries, but also the leap into electronic.</p>
            </div>
            <div class="col-md-5 admission-form_mr">
                <ul class="admission-form_listed">
                    <li>Donec molestie felis eget justo pellentesque</li>
                    <li>Phasellus et justo sit amet nisl fringilla semper.</li>
                    <li>Nam vitae ligula at risus posuere laoreet.</li>
                    <li>Mauris tempor ex id sapien tincidunt porta</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--//END ADMISSION FORM RULES -->

@stop
