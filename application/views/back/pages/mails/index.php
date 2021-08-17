    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Wiadomości</h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
      </div><!-- d-flex -->
      <div class="br-pagebody mg-t-0 pd-x-30">
        <?php if(isset($_SESSION['flashdata'])): ?>
        <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
        <?php endif; ?>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p align-top">L.p.</th>
                  <th class="wd-30p align-top">Tytuł</th>
                  <th class="wd-30p align-top">Temat</th>
                  <th class="wd-35p text-right no-sort"></th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; foreach (array_reverse($rows) as $value): $i++; ?>
                <tr>
                  <td class="align-middle"><?php echo $i; ?>.</td>
                  <td class="align-middle">
                      <?php if($value->answer == 1): ?>
                      <img src="<?php echo base_url(); ?>assets/back/img/icons/checked.png" class="wd-20 rounded-circle" alt="">
                      <?php else: ?>
                      <img src="<?php echo base_url(); ?>assets/back/img/icons/cancel.png" class="wd-20 rounded-circle" alt="">
                      <?php endif; ?>
                    <?php echo $value->name; ?></td>
                  <td class="align-middle"><?php echo substr($value->subject, 0, 70); if(strlen($value->subject) > 70) echo '...' ?></td>
                  <td class="text-right">
                      <a href="<?php echo base_url(); ?>panel/<?php echo $this->uri->segment(2); ?>/show/<?php echo $value->id; ?>" class="btn btn-sm btn-info"><i class="icon fa fa-eye mg-r-10"></i> Podgląd</a>
                      <a href="<?php echo base_url(); ?>panel/settings/delete/<?php echo $this->uri->segment(2); ?>/<?php echo $value->id; ?>" class="btn btn-sm btn-secondary" 
                      onclick="return confirm('Czy na pewno chcesz usunąć <?php echo $value->subject; ?>? #<?php echo $value->id; ?>')" >
                        <i class="fa fa-close mg-r-10"></i> Usuń
                      </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->