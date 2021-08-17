    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Profil</h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-0 pd-x-30">
        <?php if(isset($_SESSION['flashdata'])): ?>
        <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
        <?php endif; ?>

          <form class="form-layout form-layout-6" action="<?php echo base_url(); ?>panel/profile/update" method="post"  enctype="multipart/form-data">
      
                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Zdjęcie:
                  </div>
                  <div class="logo-form col-12 col-sm-8 col-lg-9 d-flex">
                            <div id="photoViewer_1" class="form-group bd-l-0-force text-center delete_photo cursor bd-0 photo-viewer" onclick="clear_box(1);">
                                <?php if(@$user->avatar != '') {
                                    echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $user->avatar . '" width="64">';
                                } else {
                                    echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/128x128" alt="">';
                                } ?>
                            </div>
                        <div class="form-group bd-t-0-force bd-l-0-force photo-viewer-button justify-item-right d-flex">
                            <input type="hidden" id="name_photo_1" name="name_photo_1">
                            <button type="button" class="btn btn-info white ml-5 my-auto" onclick="openModal(1);">Dodaj</button>
                              
                        </div>
                        </div>
                </div>

                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Imię: <span class="tx-danger">*</span>
                  </div>
                  <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name; ?>" required>
                  </div>
                </div>
                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Nazwisko: <span class="tx-danger">*</span>
                  </div>
                  <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name; ?>" required>  
                  </div>
                </div>

                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Adres Email:  <span class="tx-danger">*</span>
                  </div>
                  <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="email" name="email" value="<?php echo $user->email; ?>" required>
                  </div>
                </div>
                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Login:  
                  </div>
                  <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" value="<?php echo $user->login; ?>" readonly>
                  </div>
                </div>
                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Hasło: 
                  </div>
                  <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" name="password">
                    <small>(zostaw to pole puste, jeżeli nie chcesz zmieniać swojego hasła)</small>
                  </div>
                </div>
                <div class="row no-gutters">
                  <div class="col-12 col-sm-4 col-lg-2">
                    Poziom uprawnień: <span class="tx-danger">*</span>
                  </div>
                  <div class="col-12 col-sm-8 col-lg-9">
                    <select id="select2-a" class="form-control select2-show-search" name="rola" data-placeholder="Wybierz poziom uprawnień" required <?php if($_SESSION['rola'] != 'administrator'){echo 'disabled';}?>>
                        <option label="Wybierz poziom uprawnień"></option>
                        <option value="administrator" <?php if($user->rola == 'administrator'){echo 'selected';} ?>>
                          Administrator
                        </option>
                      </select>
                  </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-layout-footer bd pd-20 bd-t-0-force mg-md-l--1">
                      <button class="btn btn-info" type="submit">Zapisz</button>
                      <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Anuluj</button>
                    </div><!-- form-group -->
                  </div>
                </div>
            </div><!-- row -->
            <?php $this->load->view('back/forms/double_modal'); ?>
          </form><!-- form-layout -->