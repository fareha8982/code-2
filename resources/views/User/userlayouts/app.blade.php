<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('User.userlayouts.navbar')
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('User.userlayouts.sidebar')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            All Rights Reserved.
        </footer>
    </div>



<!-- Competition Modal Starts -->
<div class="modal fade" id="competitionModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-danger">
        <h4 class="modal-title text-white">
          <i class="fas fa-trophy mr-2"></i> Competition Countdown
        </h4>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body text-center">

        <h5 class="mb-4">Your competition will start in</h5>

        <div class="row justify-content-center" id="competition-countdown">
          <div class="col-3">
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="comp-days">03</h3>
                <p>Days</p>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="comp-hours">00</h3>
                <p>Hours</p>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="comp-minutes">00</h3>
                <p>Minutes</p>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="comp-seconds">00</h3>
                <p>Seconds</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer justify-content-between">
        <span class="text-muted">🏆 Get ready to compete</span>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Competition Modal Ends -->


<!-- Quiz Modal Starts -->
<div class="modal fade" id="quizModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h4 class="modal-title text-white">
          <i class="fas fa-clock mr-2"></i> Quiz Countdown
        </h4>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body text-center">

        <h5 class="mb-4">Your quiz will start in</h5>

        <div class="row justify-content-center" id="countdown">
          <div class="col-3">
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="days">03</h3>
                <p>Days</p>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="hours">00</h3>
                <p>Hours</p>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="minutes">00</h3>
                <p>Minutes</p>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="seconds">00</h3>
                <p>Seconds</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="modal-footer justify-content-between">
        <span class="text-muted">⏳ Please be ready</span>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Quiz Modal Ends -->



    <!-- Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
   

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
var ctx = document.getElementById('revenue-chart-canvas').getContext('2d');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
    datasets: [{
      label: 'Books',
      data: [10, 25, 18, 30, 22],
      borderColor: '#3c8dbc',
      backgroundColor: 'rgba(60,141,188,0.2)',
      fill: false,
      lineTension: 0.3,
      pointRadius: 4
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
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


<script>
  // Set countdown to 3 days from now
  const countdownDate = new Date();
  countdownDate.setDate(countdownDate.getDate() + 3);

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = countdownDate - now;

    if (distance < 0) {
      document.getElementById("countdown").innerHTML =
        "<h4 class='text-success'>🎉 Quiz Started!</h4>";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((distance / (1000 * 60)) % 60);
    const seconds = Math.floor((distance / 1000) % 60);

    document.getElementById("days").innerText = String(days).padStart(2, '0');
    document.getElementById("hours").innerText = String(hours).padStart(2, '0');
    document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
    document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
  }

  updateCountdown();
  setInterval(updateCountdown, 1000);
</script>


<script>
  // Competition starts in 3 days
  const competitionDate = new Date();
  competitionDate.setDate(competitionDate.getDate() + 3);

  function updateCompetitionCountdown() {
    const now = new Date().getTime();
    const distance = competitionDate - now;

    if (distance < 0) {
      document.getElementById("competition-countdown").innerHTML =
        "<h4 class='text-success'>🏁 Competition Started!</h4>";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((distance / (1000 * 60)) % 60);
    const seconds = Math.floor((distance / 1000) % 60);

    document.getElementById("comp-days").innerText = String(days).padStart(2, '0');
    document.getElementById("comp-hours").innerText = String(hours).padStart(2, '0');
    document.getElementById("comp-minutes").innerText = String(minutes).padStart(2, '0');
    document.getElementById("comp-seconds").innerText = String(seconds).padStart(2, '0');
  }

  updateCompetitionCountdown();
  setInterval(updateCompetitionCountdown, 1000);
</script>


    @stack('scripts')
</body>
</html>
