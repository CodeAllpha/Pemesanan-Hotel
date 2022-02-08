<script src="{{ url('backend/Dashboard Template/login/popper.min.js') }}"></script>
<script src="{{ url('backend/Dashboard Template/login/bootstrap.min.js') }}"></script>
<script src="{{ url('backend/Dashboard Template/login/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('backend/Dashboard Template/login/smooth-scrollbar.min.js') }}"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('backend/Dashboard Template/login/soft-ui-dashboard.min.js') }}"></script>
<script src="{{ url('https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script>