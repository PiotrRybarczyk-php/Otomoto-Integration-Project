    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Podstrony</h4>
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
                  <th class="wd-30p align-top">Strona</th>
                  <th class="wd-30p align-top">Tytuł</th>
                  <th class="wd-35p text-right no-sort">
                    <!-- <a href="<?php echo base_url(); ?>panel/subpages/form/insert" class="btn btn-sm btn-info"><i class="fa fa-plus mg-r-10"></i> Dodaj</a> -->
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; foreach ($subpages as $value): $i++; ?>
                <tr>
                  <td class="align-middle"><?php echo $i; ?>.</td>
                  <td class="align-middle"><?php echo substr($value->page, 0, 70); if(strlen($value->page) > 70) echo '...' ?></td>
                  <td class="align-middle"><a href="<?= base_url().$value->page ?>" target="_blank" title="Zobacz"><?php echo substr($value->title, 0, 70); if(strlen($value->title) > 70) echo '...' ?></a></td>
                  <td class="text-right">
                      <a href="<?php echo base_url(); ?>panel/subpages/form/update/<?php echo $value->id; ?>" class="btn btn-sm btn-info"><i class="icon ion-compose mg-r-10"></i> Edytuj</a>
                      <!-- <a href="<?php echo base_url(); ?>panel/settings/delete/subpages/<?php echo $value->id; ?>" class="btn btn-sm btn-secondary" 
                      onclick="return confirm('Czy na pewno chcesz usunąć <?php echo $value->title; ?>? #<?php echo $value->id; ?>')" >
                        <i class="fa fa-close mg-r-10"></i> Usuń
                      </a> -->
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->