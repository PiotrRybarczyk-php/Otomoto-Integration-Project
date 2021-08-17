    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))); ?></h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
        <hr>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-0 pd-x-30">
        <?php if(isset($_SESSION['flashdata'])): ?>
        <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
        <?php endif; ?>

          <form class="form-layout form-layout-2" action="<?php echo base_url(); ?>panel/<?php echo $this->uri->segment(2); ?>/action/<?php echo $this->uri->segment(4) . '/' . $this->uri->segment(2); ?>" method="post"  enctype="multipart/form-data">

            <div class="row no-gutters">
            <div class="col-md-4 order-md-2 mb-5">
                    <div class="col-md-12">
                        <div class="form-group fadeout-box">
                        <label id="infoFile" class="form-control-label"></label>
                        <label class="form-control-label">Plik:</label>
                        <input type="hidden" id="name_file_1" name="name_file_1">
                        <label class="custom-file">
                            <input type="file" id="file_1" class="custom-file-input" name="file_1" onchange="uploadFile();">
                            <span class="custom-file-control custom-file-control-inverse"></span>
                        </label>
                        </div>
                    </div><!-- col-12 -->
                </div>
                <div class="col-md-8 order-md-1">
                    <div class="row no-gutters"> <!-- set -->
                        <div class="col-md-12 pr-0">
                            <div class="form-group white-shadow-box">
                                <label class="form-control-label">Tytuł: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="title" required>
                            </div>
                        </div><!-- col-4 -->
                    </div> <!-- set -->
                    <div class="row">
                        <div class="col-md-12 pr-0">
                            <div class="form-layout-footer bd pd-20 ">
                                <button class="btn btn-info button-main-size" type="submit">Zapisz</button>
                                <button class="btn btn-secondary button-main-size" onclick="window.history.go(-1); return false;">Anuluj</button>
                            </div><!-- form-group -->
                        </div>
                    </div>
                </div>
               
            </div><!-- row -->
          </form><!-- form-layout -->

<script>
    function uploadFile() {
        document.getElementById('infoFile').innerHTML = '<span class="text-center"><i class="fas fa-spinner fa-pulse loader"></i></span>';
        setTimeout(function(){ 
            document.getElementById('infoFile').innerHTML = '<span class="text-success"><i class="fas fa-check"></i> Pliki zostały przygotowane do wysłania</span>';
        }, 1000);
      }
</script>

