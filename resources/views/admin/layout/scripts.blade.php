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
<script src="{{ asset('js/chart.min.js') }}"></script>
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

//-------------
   //- BAR CHART -
   //-------------
   var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['dec', 'feb', 'march', ],
        datasets: [{
            label: '# of Votes',
            data: [24, 45, 12],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>


@yield('admin.scripts')
