    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))); ?></h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
      </div><!-- d-flex -->
      <div class="br-pagebody mg-t-0 pd-x-30">
        <?php if (isset($_SESSION['flashdata'])) : ?>
          <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
        <?php endif; ?>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p align-top">L.p.</th>
                <th class="wd-5p align-top">Model</th>
                <th class="wd-10p align-top">Nazwa</th>
                <th class="wd-5p align-top no-sort">Status</th>
                <th class="wd-5p align-top">Sprzedawca</th>
                <th class="wd-5p align-top">Kategoria</th>
                <th class="wd-5p align-top">Cena</th>
                <th class="wd-5p align-top no-sort">Widoczność<br>Strona</th>
                <th class="wd-5p align-top no-sort">Widoczność<br>Otomoto</th>
                <th class="wd-10p text-right no-sort">
                  <a href="<?php echo base_url(); ?>panel/<?php echo $this->uri->segment(2); ?>/form/insert" class="btn btn-sm btn-info"><i class="fa fa-plus mg-r-10"></i> Dodaj</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              $car_info = array();
              $temp = ' ';
              foreach (array_reverse($rows) as $value) : $i++; ?>
                <?php
                $car_info[0] = $this->back_m->get_one('brands', $value->brand_id)->name;
                $car_info[1] = $this->back_m->get_one('brand_models', $value->brand_model_id)->name ?? ' ';
                $car_info[2] = $value->otomoto_status . '<br>' . $value->otomoto_updated;
                $temp = $this->back_m->get_one('user', $value->user_id);
                $car_info[3] = $temp->name . ' ' . $temp->surname;
                if ($value->publish == 1) $car_info[4] = '<font style="color:green;font-weight:bold;">Publiczny</font>';
                else $car_info[4] = '<font style="color:red;font-weight:bold;">Niepubliczny</font>';
                if ($value->otomoto_publish == 1) $car_info[5] = '<font style="color:green;font-weight:bold;">Publiczny</font>';
                else $car_info[5] = '<font style="color:red;font-weight:bold;">Niepubliczny</font>';
                ?>
                <tr>
                  <td class="align-middle"><?php echo $i; ?>.</td>
                  <td class="align-middle"><?= $car_info[0] . ' ' . $car_info[1]; ?></td>
                  <td class="align-middle" style="white-space:normal;"><?php echo substr($value->title, 0, 70);
                                                                        if (strlen($value->title) > 70) echo '...' ?></td>
                  <td class="align-middle"><?= $car_info[2]; ?></td>
                  <td class="align-middle"><?= $car_info[3]; ?></td>
                  <td class="align-middle"><?= $value->category; ?></td>
                  <td class="align-middle"><?= $value->price; ?></td>
                  <td class="align-middle"><?= $car_info[4]; ?></td>
                  <td class="align-middle"><?= $car_info[5]; ?></td>
                  <td class="text-right">
                    <a href="<?php echo base_url(); ?>panel/<?= $this->uri->segment(2); ?>/gallery/<?php echo $value->id; ?>" class="btn btn-sm btn-secondary"><i class="icon ion-images mg-r-10"></i> Galeria</a>
                    <a href="<?php echo base_url(); ?>panel/<?= $this->uri->segment(2); ?>/otomoto_form/<?php echo $value->id; ?>" class="btn btn-sm btn-secondary"><i class="icon ion-compose mg-r-10"></i> Edycja Otomoto</a>
                    <br>
                    <a href="<?php echo base_url(); ?>panel/<?php echo $this->uri->segment(2); ?>/form/update/<?php echo $value->id; ?>" class="btn btn-sm btn-info"><i class="icon ion-compose mg-r-10"></i> Edytuj</a>
                    <a href="<?php echo base_url(); ?>panel/settings/delete/<?php echo $this->uri->segment(2); ?>/<?php echo $value->id; ?>" class="btn btn-sm btn-secondary" onclick="return confirm('Czy na pewno chcesz usunąć <?php echo $value->title; ?>? #<?php echo $value->id; ?>')">
                      <i class="fa fa-close mg-r-10"></i> Usuń
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php unset($temp); ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->