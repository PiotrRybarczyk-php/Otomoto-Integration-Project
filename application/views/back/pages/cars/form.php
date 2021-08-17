<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(1))); ?></h4>
    <p class="mg-b-0"><?php echo subtitle(); ?></p>
  </div><!-- d-flex -->

  <div class="br-pagebody mg-t-0 pd-x-30">
    <?php if (isset($_SESSION['flashdata'])) : ?>
      <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
    <?php endif; ?>


    <form class="form-layout form-layout-6" action="<?php echo base_url() . 'panel/' . $this->uri->segment(2) . '/action/' . $this->uri->segment(4) . '/' . $table; ?>/<?php echo @$value->id; ?>" method="post" enctype="multipart/form-data">


      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Kolor:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="name" value="<?= @$value->name; ?>" required>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Kod Koloru:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="code" value="<?= @$value->code; ?>" required>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Kolor Otomoto:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <input class="form-control" type="text" name="otomotoname" value="<?= @$value->otomotoname; ?>" required>
        </div>
      </div>




      <div class="form-layout-footer bd bd-t-0-force pd-20">
        <button class="btn btn-info" type="submit">Zapisz</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
      </div>
    </form><!-- form-layout -->