<!-- Bar Chart -->
<div class="main-panel bg-panel addmargin">
  <div class="page-inner">
    <div class="row justify-content-md-center">

      <div class="col col-lg-1"></div>
      <div class="col col-lg-9">
        <div class="card shadow bg-tabel mb-4 marginChart ratios ">
          <div class="card-header py-3 ">
            <div class="d-flex align-items-center">
              <h4 class="card-title" style="color: white">Customer</h4>

            </div>

          </div>
          <div class="card-body bg-body-tabel ">
            <!-- Modal -->

            <div class="row">
              <div class="col-12">
                <canvas id="myBarChart" height=170%></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
<script src="<?= base_url('assets/') ?>js/core/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets') ?>/js/plugin/chart.js/chart.min.js"></script>
<!-- Page level custom scripts -->
<script>
  $(document).ready(function() {

    var myBarChart = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(myBarChart, {
      type: 'horizontalBar',
      data: {
        labels: <?php
                echo "[";
                foreach ($customers as $c) {
                  echo "'" . $c->nama_customer . "',";
                }
                echo "]";
                ?>,
        datasets: [{
          label: "Customers",
          backgroundColor: 'rgb(23, 125, 255)',
          borderColor: 'rgb(23, 125, 255)',
          data: <?php
                echo "[";
                foreach ($customers as $c) {
                  echo "'" . $c->n . "',";
                }
                echo "]";
                ?>
        }],
      },

      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
          display: true,
          position: 'right',
          labels: {
            fontColor: '#000'
          }
        },
        scales: {
          xAxes: [{
            ticks: {
              min: 0,
              callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            }
          }]
        },
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 10,
            bottom: 0
          }
        },
        tooltips: {
          enabled: true
        }
      }
    });
  });
</script>