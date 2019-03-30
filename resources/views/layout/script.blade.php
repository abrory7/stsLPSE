<!-- Required Jqurey -->
<script src="{{ asset('res/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('res/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('res/assets/plugins/tether/dist/js/tether.min.js') }}"></script>

<!-- Required Fremwork -->
<script src="{{ asset('res/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- waves effects.js -->
<script src="{{ asset('res/assets/plugins/Waves/waves.min.js') }}"></script>

<!-- Scrollbar JS-->
<script src="{{ asset('res/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('res/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

<!--classic JS-->
<script src="{{ asset('res/assets/plugins/classie/classie.js') }}"></script>

<!-- notification -->
<script src="{{ asset('res/assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

<!-- Rickshaw Chart js -->
<script src="{{ asset('res/assets/plugins/d3/d3.js') }}"></script>
<script src="{{ asset('res/assets/plugins/rickshaw/rickshaw.js') }}"></script>

<!-- Sparkline charts -->
<script src="{{ asset('res/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

<!-- Counter js  -->
<script src="{{ asset('res/assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('res/assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

<!-- Datatable js -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<!-- custom js -->
<script type="text/javascript" src="{{ asset('res/assets/js/main.js') }} "></script>
<script type="text/javascript" src="{{ asset('res/assets/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('res/assets/pages/elements.js') }}"></script>
<script src="{{ asset('res/assets/js/menu.min.js') }}"></script>
<!-- Datatable -->
<script>
  var $window = $(window);
  var nav = $('.fixed-button');
  $window.scroll(function(){
    if ($window.scrollTop() >= 200) {
      nav.addClass('active');
    }
    else {
      nav.removeClass('active');
    }
  });
</script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<script>
  $("#dataTable").DataTable();
</script>
@yield('AddScript')
