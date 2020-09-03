<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/tether.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Plugins -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/counterup.min.js')}}"></script>
<script src="{{asset('js/instafeed.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/validate.js')}}"></script>
<script src="{{asset('js/tweetie.min.js')}}"></script>
<!-- Subscribe -->
<script src="{{asset('js/subscribe.js')}}"></script>
<!-- Script JS -->
<script src="{{asset('js/script.js')}}"></script>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

@yield('site.scripts')
