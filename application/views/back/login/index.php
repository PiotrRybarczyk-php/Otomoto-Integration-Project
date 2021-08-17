<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Panel administracyjny - AD Awards</title>

    <link href="<?php echo base_url(); ?>assets/back/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/back/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/bracket.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/back/css/style.css">
  </head>
  <body>
    <form method="post" action="<?php echo base_url(); ?>panel" class="d-flex align-items-center justify-content-center bg-gray-900 ht-100v">
      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> AD Awards <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">Panel administracyjny dla Perfekcjonisty</div>

        <?php if(isset($_SESSION['flashdata'])): ?>
        <p><?php echo $_SESSION['flashdata']; ?></p>
        <?php endif; ?>

        <div class="form-group">
          <input type="text" class="form-control" name="login" placeholder="Wprowadź login lub adres e-mail">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Wprowadź hasło">
          <a href="<?php echo base_url(); ?>panel/home/reset_pass" class="tx-info tx-12 d-block mg-t-10 link">Zapomniałem hasło</a>
        </div>
        <button type="submit" class="btn btn-info btn-block">Zaloguj się</button>
      </div>
    </form>

    <script src="<?php echo base_url(); ?>assets/back/lib/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/back/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/back/lib/bootstrap/bootstrap.js"></script>
    
  </body>
</html>
