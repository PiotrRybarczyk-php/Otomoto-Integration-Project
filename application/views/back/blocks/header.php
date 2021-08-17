<!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>AD Awards<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Nawigacja</label>
      <div class="br-sideleft-menu">
        <a href="<?php echo base_url(); ?>panel/dashboard" class="br-menu-link 
        <?php if($this->uri->segment(2) == 'dashboard'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon fas fa-desktop tx-20"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="<?php echo base_url(); ?>panel/subpages" class="br-menu-link
        <?php if($this->uri->segment(2) == 'subpages'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon fas fa-folder-open tx-20"></i>
            <span class="menu-item-label">Podstrony</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
       
        <a href="<?php echo base_url(); ?>panel/settings/gallery/gallery_page/1" class="br-menu-link
        <?php if($this->uri->segment(4) == 'gallery_page'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon fas fa-photo tx-20"></i>
            <span class="menu-item-label">Galeria</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="<?php echo base_url(); ?>panel/media" class="br-menu-link
        <?php if($this->uri->segment(2) == 'media'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon fab fa-medium tx-20"></i>
            <span class="menu-item-label">Media</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="<?php echo base_url(); ?>panel/mails" class="br-menu-link
        <?php if($this->uri->segment(2) == 'mails'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon fas fa-mail-bulk tx-20"></i>
            <span class="menu-item-label">Skrzynka mailowa</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="<?php echo base_url(); ?>panel/example" class="br-menu-link
        <?php if($this->uri->segment(2) == 'example' || $this->uri->segment(4) == 'example'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon icon fab fa-wpforms tx-20"></i>
            <span class="menu-item-label">Example form</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a href="#" class="br-menu-link
        <?php if($this->uri->segment(2) == 'example_dropdown' || $this->uri->segment(4) == 'example_dropdown'){echo 'active';} ?>">
          <div class="br-menu-item">
            <i class="menu-item-icon far fa-caret-square-down tx-20"></i>
            <span class="menu-item-label">Example dropdown</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
          <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
          <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
          <li class="nav-item"><a href="chart-chartist.html" class="nav-link">Chartist</a></li>
          <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
          <li class="nav-item"><a href="chart-peity.html" class="nav-link">Peity</a></li>
        </ul>
      </div><!-- br-sideleft-menu -->
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-email-outline tx-24"></i>
              <!-- start: if statement -->
              <?php $unreadMessage = false; 
              $i = 0;
              foreach($mails as $value) { 
                $i++;
                if($value->answer == 0) {
                  $unreadMessage = true;
                }
                if($i==5){
                  break;
                }
              }
              if($unreadMessage == true): ?>
              <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
              <?php endif; ?>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
              <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Wiadomości</label>
              </div><!-- d-flex -->

              <div class="media-list">
              <?php if(empty($mails)){echo '<p class="p-3">Brak wiadomości w skrzynce</p>';} ?>
              <?php $i=0; foreach(array_reverse($mails) as $value): $i++; ?>
                <a href="<?php echo base_url(); ?>panel/mails/show/<?php echo $value->id; ?>" class="media-list-link <?php if($value->answer == 0){echo 'read';} ?>">
                  <div class="media pd-x-20 pd-y-15">
                    <?php if($value->answer == 1): ?>
                    <img src="<?php echo base_url(); ?>assets/back/img/icons/checked.png" class="wd-40 rounded-circle" alt="">
                    <?php else: $unreadMessage == true; ?>
                    <img src="<?php echo base_url(); ?>assets/back/img/icons/cancel.png" class="wd-40 rounded-circle" alt="">
                    <?php endif; ?>
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14"><?php echo $value->name; ?></p>
                        <span class="tx-11 tx-gray-500"><?php echo date('d/m/Y', strtotime($value->created)); ?></span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0"><?php echo $value->subject; ?></p>
                    </div>
                  </div><!-- media -->
                </a> 
                <?php if($i==5) {break;}?>
                <?php endforeach; ?>
                <div class="pd-y-10 tx-center bd-t">
                  <a href="<?php echo base_url(); ?>panel/mails" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Wyświetl wszystkie wiadomości</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->

          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo ucfirst($_SESSION['rola']); ?></span>
              <?php if(@$user->avatar != '') {
                echo '<span class="avatar" style="background: url(' . base_url() . 'uploads/' . @$user->avatar . ')"></span>';
              } else {
                echo '<span class="avatar" style="background: url(http://via.placeholder.com/64x64)"></span>';
              } ?>
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="<?php echo base_url(); ?>panel/profile"><i class="icon ion-ios-person"></i> Edytuj profil</a></li>
                <li><a href="<?php echo base_url(); ?>panel/home/logout"><i class="icon ion-power"></i> Wyloguj się</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="fas fa-angle-double-left"></i>
            <!-- start: if statement -->
            
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#calendar"><i class="icon ion-ios-calendar-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#contact"><i class="icon ion-clipboard tx-24"></i></a>
        </li>   
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#settings"><i class="icon ion-ios-gear-outline tx-24"></i></a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active" id="calendar" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Czas &amp; Data</label>
          <div class="pd-x-25">
            <h2 id="brTime" class="tx-white tx-lato mg-b-5"></h2>
            <h6 id="brDate" class="tx-white tx-light op-3"></h6>
          </div>
          <label class="sidebar-label pd-x-25 mg-t-25">Kalendarz</label>
          <div class="datepicker sidebar-datepicker"></div>
        </div>
        
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="contact" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Dane kontaktowe</label>

          <div class="change"></div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Nazwa firmy:</h6>
            <div class="pos-relative">
              <input type="text" id="company" name="company" onchange="updateField('company' , 'contact_settings')" value="<?php echo $contact->company; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Imię i nazwisko właściciela:</h6>
            <div class="pos-relative">
              <input type="text" id="name" name="name" onchange="updateField('name' , 'contact_settings')" value="<?php echo $contact->name; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>
          
          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Adres firmy:</h6>
            <div class="pos-relative">
              <input type="text" id="address" name="address" onchange="updateField('address' , 'contact_settings')" value="<?php echo $contact->address; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Miasto:</h6>
            <div class="pos-relative">
              <input type="text" id="city" name="city" onchange="updateField('city' , 'contact_settings')" value="<?php echo $contact->city; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Kod pocztowy:</h6>
            <div class="pos-relative">
              <input type="text" id="zip_code" name="zip_code" onchange="updateField('zip_code' , 'contact_settings')" value="<?php echo $contact->zip_code; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="pd-y-20 pd-l-25 tx-white">
                <h6 class="tx-13 tx-normal">Etykieta:</h6>
                <div class="pos-relative">
                  <input type="text" id="label1" name="label1" onchange="updateField('label1' , 'contact_settings')" value="<?php echo $contact->label1; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pd-y-20 pd-r-25 tx-white">
                <h6 class="tx-13 tx-normal">Numer telefonu:</h6>
                <div class="pos-relative">
                  <input type="text" id="phone1" name="phone1" onchange="updateField('phone1' , 'contact_settings')" value="<?php echo $contact->phone1; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="pd-y-20 pd-l-25 tx-white">
                <h6 class="tx-13 tx-normal">Etykieta:</h6>
                <div class="pos-relative">
                  <input type="text" id="label2" name="label2" onchange="updateField('label2' , 'contact_settings')" value="<?php echo $contact->label2; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pd-y-20 pd-r-25 tx-white">
                <h6 class="tx-13 tx-normal">Numer telefonu:</h6>
                <div class="pos-relative">
                  <input type="text" id="phone2" name="phone2" onchange="updateField('phone2' , 'contact_settings')" value="<?php echo $contact->phone2; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="pd-y-20 pd-l-25 tx-white">
                <h6 class="tx-13 tx-normal">Etykieta:</h6>
                <div class="pos-relative">
                  <input type="text" id="label3" name="label3" onchange="updateField('label3' , 'contact_settings')" value="<?php echo $contact->label3; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pd-y-20 pd-r-25 tx-white">
                <h6 class="tx-13 tx-normal">Adres e-mail:</h6>
                <div class="pos-relative">
                  <input type="text" id="email1" name="email1" onchange="updateField('email1' , 'contact_settings')" value="<?php echo $contact->email1; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="pd-y-20 pd-l-25 tx-white">
                <h6 class="tx-13 tx-normal">Etykieta:</h6>
                <div class="pos-relative">
                  <input type="text" id="label4" name="label4" onchange="updateField('label4' , 'contact_settings')" value="<?php echo $contact->label4; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pd-y-20 pd-r-25 tx-white">
                <h6 class="tx-13 tx-normal">Adres e-mail:</h6>
                <div class="pos-relative">
                  <input type="text" id="email2" name="email2" onchange="updateField('email2' , 'contact_settings')" value="<?php echo $contact->email2; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="pd-y-20 pd-l-25 tx-white">
                <h6 class="tx-13 tx-normal">Etykieta:</h6>
                <div class="pos-relative">
                  <input type="text" id="label5" name="label5" onchange="updateField('label5' , 'contact_settings')" value="<?php echo $contact->label5; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pd-y-20 pd-r-25 tx-white">
                <h6 class="tx-13 tx-normal">Godziny otwarcia:</h6>
                <div class="pos-relative">
                  <input type="text" id="hours" name="hours" onchange="updateField('hours' , 'contact_settings')" value="<?php echo $contact->hours; ?>" class="form-control form-control-inverse transition pd-y-10">
                </div>
              </div>
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Link do mapy Google:</h6>
            <div class="pos-relative">
              <input type="text" id="map" name="map" onchange="updateFieldMap('map' , 'contact_settings')" value="<?php echo $contact->map; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
            <div id="googleMap" class="text-center">
              <iframe src="<?php echo $contact->map; ?>" width="100%" height="150" frameborder="0" style="border:0; margin-top: 20px;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div><!-- #cotact -->


        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="settings" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Ustawienia strony</label>

          <div class="change"></div>
          
          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Logo:</h6>
            <p class="op-5 tx-13">Logo wyświetlane na stronie, w zakładce i Google</p>
            <div class="pos-relative">
                <div id="photoViewer_logo" class="form-group bd-t-0-force bd-r-0-force text-center">
                  <?php if($settings->logo != '') {
                    echo '<img class="img-fluid img-thumbnail" src="' . base_url() . 'uploads/' . $settings->logo . '" width=74>';
                  } else {
                    echo '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/64x64" alt="">';
                  } ?>
                </div>
              <input type="hidden" id="name_photo_logo" name="name_photo_logo">
                  <label class="custom-file">
                    <input type="file" id="photo_logo" class="custom-file-input" name="photo_logo" 
                    onchange="updateFieldPhoto('photo_logo' , 'settings')">
                    <span class="custom-file-control custom-file-control-inverse"></span>
                  </label>
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Kolor pierwszorzędny:</h6>
            <div class="pos-relative">
              <input type="color" id="first_color" name="first_color" onchange="updateField('first_color' , 'settings')" value="<?php echo $settings->first_color; ?>" class="form-control form-control-inverse transition pd-y-5">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Nazwa witryny:</h6>
            <p class="op-5 tx-13">Nazwa, która będzie wyświetlać się w zakładce i przeglądarce Google.</p>
            <div class="pos-relative">
              <input type="text" id="meta_title" name="meta_title" onchange="updateField('meta_title' , 'settings')" value="<?php echo $settings->meta_title; ?>"  class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Słowa kluczowe:</h6>
            <p class="op-5 tx-13">Frazy po których Google indeksuje stronę.</p>
            <div class="pos-relative">
              <input type="text" id="keywords" name="keywords" onchange="updateField('keywords' , 'settings')" value="<?php echo $settings->keywords; ?>" class="form-control form-control-inverse transition pd-y-10" data-role="tagsinput"> 
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Opis witryny:</h6>
            <p class="op-5 tx-13">Opis wyświetlany pod nazwa w przeglądarce Google</p>
            <div class="pos-relative">
              <textarea id="description" name="description" rows="5" onfocusout="updateTextarea('description' , 'settings')"  class="form-control form-control-inverse transition pd-y-10"><?php echo $settings->description; ?></textarea>
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Facebook:</h6>
            <p class="op-5 tx-13">Adres URL do Twojego profilu na Facebook'u</p>
            <div class="pos-relative">
              <input type="text" id="fb_link" name="fb_link" onchange="updateField('fb_link' , 'settings')" value="<?php echo $settings->fb_link; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Twitter:</h6>
            <p class="op-5 tx-13">Adres URL do Twojego profilu na Twitter'ze</p>
            <div class="pos-relative">
              <input type="text" id="tw_link" name="tw_link" onchange="updateField('tw_link' , 'settings')" value="<?php echo $settings->tw_link; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Instagram:</h6>
            <p class="op-5 tx-13">Adres URL do Twojego profilu na Instagram'ie</p>
            <div class="pos-relative">
              <input type="text" id="inst_link" name="inst_link" onchange="updateField('inst_link' , 'settings')" value="<?php echo $settings->inst_link; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">YouTube:</h6>
            <p class="op-5 tx-13">Adres URL do Twojego profilu na YouTube'ie</p>
            <div class="pos-relative">
              <input type="text" id="yt_link" name="yt_link" onchange="updateField('yt_link' , 'settings')" value="<?php echo $settings->yt_link; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>



          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Captcha:</h6>
            <p class="op-5 tx-13">Klucz Witryny</p>
            <div class="pos-relative">
              <input type="text" id="captcha" name="captcha" onchange="updateField('captcha' , 'settings')" value="<?php echo $settings->captcha; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Captcha:</h6>
            <p class="op-5 tx-13">Klucz Tajny</p>
            <div class="pos-relative">
              <input type="text" id="captcha_secret" name="captcha_secret" onchange="updateField('captcha_secret' , 'settings')" value="<?php echo @$settings->captcha_secret; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Tiny:</h6>
            <p class="op-5 tx-13">Klucz</p>
            <div class="pos-relative">
              <input type="text" id="tiny" name="tiny" onchange="updateField('tiny' , 'settings')" value="<?php echo @$settings->tiny; ?>" class="form-control form-control-inverse transition pd-y-10">
            </div>
          </div>

          
          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Zgoda rodo:</h6>
            <p class="op-5 tx-13">Klauzula RODO</p>
            <div class="pos-relative">
              <textarea id="rodo" name="rodo" rows="5" onfocusout="updateTextarea('rodo' , 'settings')"  class="form-control form-control-inverse transition pd-y-10"><?php echo $settings->rodo; ?></textarea>
            </div>
          </div>

          <div class="pd-y-20 pd-x-25 tx-white">
            <h6 class="tx-13 tx-normal">Zgoda na kontakt telefoniczny:</h6>
            <p class="op-5 tx-13">Klauzula RODO</p>
            <div class="pos-relative">
              <textarea id="rodo_tel" name="rodo_tel" rows="5" onfocusout="updateTextarea('rodo_tel' , 'settings')"  class="form-control form-control-inverse transition pd-y-10"><?php echo $settings->rodo_tel; ?></textarea>
            </div>
          </div>

          <div class="pd-y-20 pd-x-25">
            <h6 class="tx-13 tx-normal tx-white m-0">Więcej ustawień</h6>
            <label class="custom-file" style="height:4rem;">
              <input type="file" id="privace" name="privace" class="custom-file-input" style="height: 0;" 
              onchange="updateFieldPrivace('privace' , 'settings')">
              <span id="privaceTx" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2 mb-4">
                Polityka prywatności
                <?php if($settings->privace != ''): ?>
                <i class="fas fa-check"></i>
                <?php endif; ?>
              </span>
            </label>
            <a href="<?php echo base_url(); ?>panel/profile" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Ustawienia profilu</a>
          </div>

        </div>
      </div><!-- tab-content -->
    </div><!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
