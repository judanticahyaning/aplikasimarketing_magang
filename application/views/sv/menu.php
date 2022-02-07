<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Menu</title>
  <link rel="stylesheet" href="../template/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="icon" href="<?= base_url('assets/') ?>img/logo/logo_gt.png" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="services">
    <h1>MARKETING</h1>

    <div class="cen">
     
     <div class="service">
      <form action="<?= base_url('C_menu/menu')?>" method ="post" >
        <span style="font-size: 48px;">
          <i class="fas fa-poll"></i>
        </span>
        <input type="submit" name="activity" class="btn-log" value="E-ACTIVITY">
        <p>schedule AM ​​daily activity data and plans, customer data, detailed AM work results</p>
      </form>
    </div>

    <div class="service">
      <form action="<?= base_url('C_menu/menu')?>" method ="post" >
        <span style="font-size: 48px;">
          <i class="fas fa-lightbulb"></i>
        </span>
        <input type="submit" name="prospect" class="btn-log" value="E-PROSPECT">
        <p>project data to be worked on and detailed project details</p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
