<script src="/dashboard/js/excanvas.min.js"></script>
<script src="/dashboard/js/jquery.min.js"></script>
<script src="/dashboard/js/jquery-ui.custom.js"></script>
<script src="/dashboard/js/bootstrap.min.js"></script>
<script src="/dashboard/js/jquery.flot.min.js"></script>
<script src="/dashboard/js/jquery.flot.resize.min.js"></script>
<script src="/dashboard/js/jquery.sparkline.min.js"></script>
<script src="/dashboard/js/fullcalendar.min.js"></script>

<script src="/dashboard/js/jquery.nicescroll.min.js"></script>
<script src="/dashboard/js/unicorn.js"></script>
<script src="/dashboard/js/unicorn.dashboard.js"></script>
<script src="/dashboard/js/jquery.gritter.min.js"></script>

<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="/js/iyiola-forms.js"></script>
<script>
@if(Session::has('message'))
  var type = "{{ Session::get('alert-type') }}";
  switch(type){
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;

      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
  }
@endif

</script>
@yield('admin.scripts')
