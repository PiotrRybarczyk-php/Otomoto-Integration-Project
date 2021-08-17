    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5"><?php echo $title ?></h4>
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
                  <th class="wd-10p-force align-top">L.p.</th>
                  <th class="wd-10p-force align-top no-sort">podglad</th>
                  <th class="wd-40p-force align-top">Tytuł</th>
                  <th class="wd-5p no-sort text-right">
                    <a href="<?php echo base_url(); ?>panel/<?php echo $this->uri->segment(2); ?>/form/insert" class="btn btn-sm btn-info"><i class="fa fa-plus mg-r-10"></i> Dodaj</a>
                  </th>
                  
                </tr>
              </thead>
              <tbody>
              <div id="input-container"></div>
                <?php $i=0; foreach (array_reverse($rows) as $value): $i++;  $link = base_url().'uploads/'.date('Y-m-d', strtotime($value->created)).'/'.$value->name;?>
                <tr>
                  <td class="align-middle"><?php echo $i; ?>.</td>
                  <td class="align-middle">
                    <?php 
                    $str = $value->type;
                    $pattern = "/^image/i";
                    $result = preg_match($pattern, $str);
                    if($result==1):
                    ?>
                      <a href="<?= $link ?>" target="_blank"><img class="" width="40" src=<?= $link ?>></a>
                    <?php endif ?>
                    </td>
                  <td class="align-middle"><?php echo substr($value->raw_name, 0, 70); if(strlen($value->raw_name) > 70) echo '...' ?></td>
                  
                  <td class="text-right">
        
                  <a class="btn btn-info btn-sm" href="<?= $link ?>" target="_blank"><i class="fas fa-eye mx-2 my-1"></i></a>
                  <button  data-link="<?= $link ?>" class="btn btn-primary btn-sm copy">Kopiuj Link</button>
                  
                  <a href="<?php echo base_url(); ?>panel/settings/delete/<?php echo $this->uri->segment(2); ?>/<?php echo $value->id; ?>" class="btn btn-sm btn-secondary" 
                      onclick="return confirm('Czy na pewno chcesz usunąć <?php echo $value->raw_name; ?>? #<?php echo $value->id; ?>')" >
                        <i class="fa fa-close mg-r-10"></i> Usuń
                      </a></td>
                  
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->




  <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div id="modal-image-src"></div>
        </div>
      </div>
    </div>
  </div>
</div>
