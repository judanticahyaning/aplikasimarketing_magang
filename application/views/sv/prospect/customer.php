<div class="main-panel bg-panel addmargin">
  <div class="page-inner">
    <div class="row justify-content-md-center">
      <div class="col col-lg-1"></div>
      <div class="col col-lg-9">
        <div class="card shadow mb-4 marginChart ratios ">
          <div class="card-header py-3 bg-tabel">
            <div class="d-flex align-items-center">
              <h4 class="card-title" style="color: white">Customer Engagement</h4>
            </div>
          </div>
          <div class="card-body bg-body-tabel  ">
            <!-- Modal -->
            <div class="row">
              <div class="col-8"></div>
              <div class="col col-3 justify-content-end">
                <select id="amcustomer" class="form-control ">
                  <option selected value="0">All</option>
                  <?php foreach ($am as $am) { ?>
                    <option value="<?= $am->id_am ?>"><?= $am->nama_am ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-12 myBar">
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

    if ($("#amcustomer option:selected").val() == 0) {
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
    }
  });
  $('#amcustomer').change(function() {
    $('.myBar').empty();
    $('.myBar').append('<canvas id="myBarChart" height=170px></canvas>');

    var idam = $("#amcustomer option:selected").val();
    if (idam == 0) {
      idam = "activity.id_am"
    }
    var dataNama = [];
    var dataJumlah = [];
    var settings = {
      "url": "getCust/" + idam,
      "method": "GET",
      "timeout": 0,
    };


    $.ajax(settings).done(function(response) {
      var obj = JSON.parse(response);
      $.each(obj, function(i, c) {
        dataNama.push(c.nama_customer);
        dataJumlah.push(parseInt(c.n))
      });
      console.log(dataNama);
      console.log(dataJumlah);

    }).done(function() {
      var myBarChart = document.getElementById('myBarChart').getContext('2d');
      myBarChart = new Chart(myBarChart, {
        type: 'horizontalBar',
        data: {
          labels: dataNama,
          datasets: [{
            label: "Customers",
            backgroundColor: 'rgb(23, 125, 255)',
            borderColor: 'rgb(23, 125, 255)',
            data: dataJumlah
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
    })
  });
</script>