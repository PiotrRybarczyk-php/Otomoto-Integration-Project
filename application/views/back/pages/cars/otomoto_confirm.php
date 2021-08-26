<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
  <div class="pd-30">
    <h4 class="tx-gray-800 mg-b-5"><?php echo "Potwierdź konto"; ?></h4>
    <p class="mg-b-0"><?php echo subtitle(); ?></p>
  </div><!-- d-flex -->

  <div class="br-pagebody mg-t-0 pd-x-30">
    <?php if (isset($_SESSION['flashdata'])) : ?>
      <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
    <?php endif; ?>


    <form class="form-layout form-layout-6" action="<?php echo base_url() . 'panel/' . $this->uri->segment(2) . '/post_car/' . $car_id; ?>" method="post" enctype="multipart/form-data">

      <div class="row no-gutters">
        <div class="col-12 col-sm-4 col-lg-2">
          Konto:
        </div>
        <div class="col-12 col-sm-8 col-lg-9">
          <select class="form-control" id="account" name="account">
            <?php foreach ($rows as $element) : ?>
              <option value="<?= $element->id; ?>"><?= $element->username; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="form-layout-footer bd bd-t-0-force pd-20">
        <button class="btn btn-info" type="submit">Wystaw na Otomoto</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
      </div>
    </form><!-- form-layout -->