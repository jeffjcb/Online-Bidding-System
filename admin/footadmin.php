<div class="fixed-plugin">
      <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
          <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
          <li class="adjustments-line text-center color-change">
            <span class="color-label">JULIUS MODE</span>
            <span class="badge light-badge mr-2"></span>
            <span class="badge dark-badge ml-2"></span>
            <span class="color-label">REGINA MODE</span>
          </li>
        </ul>
      </div>
    </div>

  <!--   Core JS Files   -->
    <script src="node_modules/black-dashboard/assets/js/core/jquery.min.js"></script>
    <script src="node_modules/black-dashboard/assets/js/core/popper.min.js"></script>
    <script src="node_modules/black-dashboard/assets/js/core/bootstrap.min.js"></script>
    <script src="node_modules/black-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="node_modules/black-dashboard/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="node_modules/black-dashboard/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="node_modules/black-dashboard/assets/js/black-dashboard.min.js?v=1.0.0" type="text/javascript"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="node_modules/black-dashboard/assets/demo/demo.js"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
    <script>
$(document).ready( function () {
    $('#myTtable').DataTable();
} );



     $('body').addClass('white-content');
        //CHANGE Lightmode or Darkmode
      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $('.sidebar');
          $navbar = $('.navbar');
          $full_page = $('.full-page');
          $sidebar_responsive = $('body > .navbar-collapse');
          sidebar_mini_active = true;
          white_color = false;
          window_width = $(window).width();
          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();


          $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
            var $btn = $(this);

            if (white_color == true) {

              $('body').addClass('change-background');
              setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').removeClass('white-content');
              }, 900);
              white_color = false;
            } else {
              $('body').addClass('change-background');
              setTimeout(function() {
                $('body').removeClass('change-background');
                $('body').addClass('white-content');
              }, 900);
              white_color = true;
            }
          });

          $('.light-badge').click(function() {
            $('body').addClass('white-content');
          });

          $('.dark-badge').click(function() {
            $('body').removeClass('white-content');
          });
        });
      });
    </script>
</body>

</html>