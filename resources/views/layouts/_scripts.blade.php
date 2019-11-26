<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Plugins -->
<script src="js/slick.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/instafeed.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/validate.js"></script>
<script src="js/tweetie.min.js"></script>
<!-- Subscribe -->
<script src="js/subscribe.js"></script>
<!-- Script JS -->
<script src="js/script.js"></script>

@yield('site.scripts')

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
