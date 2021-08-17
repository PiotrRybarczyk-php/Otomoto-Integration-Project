    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Wiadomości #<?php echo $value->id; ?></h4>
        <p class="mg-b-0"><?php echo subtitle(); ?></p>
        <hr>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-0 pd-x-30">
        <?php if(isset($_SESSION['flashdata'])): ?>
        <div id="alert-box"><?php echo $_SESSION['flashdata']; ?></div>
        <?php endif; ?>

          <div class="form-layout form-layout-6">
<!-- 
            <div class="row no-gutters">
                <div class="col-md-6"> -->
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Imię i nazwisko:
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input class="form-control" type="text" name="alt" value="<?= @$value->name; ?>" readonly>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Adres E-mail:
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input class="form-control" type="text" name="alt" value="<?= @$value->email; ?>" readonly>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Telefon:
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input class="form-control" type="text" value="<?php echo $value->phone; ?>" readonly>  
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Temat:
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input class="form-control" type="text" value="<?php echo $value->subject; ?>" readonly>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Treść wiadomości:
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input class="form-control" type="text" value="<?php echo $value->message; ?>" readonly>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-sm-12">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($value->rodo1 == 1){echo 'checked';} ?> onclick="return false;">
                                    <span>Zgoda na przetwarzanie danych osobowych</span>
                                </label>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-sm-12">
                                <label class="ckbox">
                                    <input type="checkbox" <?php if($value->rodo2 == 1){echo 'checked';} ?> onclick="return false;">
                                    <span>Zgoda na kontakt mailowy i telefoniczny</span>
                                </label>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Temat Twojej wiadomości:
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <div class="form-group">
                                <div id="answer">
                                    <?php if($value->answer == 1): ?>
                                    <span class="text-success"><i class="fas fa-check"></i> Odpowiedź została wysłana!</span>
                                    <?php endif; ?>
                                </div>
                                <input class="form-control" type="text" name="subject" required>
                            </div>
                            <div class="form-group bd-t-0-force">
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-4 col-lg-2">
                            Treść Twojej wiadomości
                        </div>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <div class="form-group bd-t-0-force">
                            <textarea class="summernote" class="form-control" name="message"></textarea>
                        </div>
                        </div>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-md-12 pr-0">
                            <div class="form-layout-footer bd pd-20 bd-r-0-force">
                                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Powrót</button>
                                <button class="btn btn-info" onclick="sendMessage(<?php echo $value->id; ?>)">Wyślij</button>
                            </div><!-- form-group -->
                        </div>
                    </div>


                </div>
               
            </div><!-- row -->
        </div><!-- form-layout -->


    <script type="text/javascript">
      function sendMessage(id)
      {
        var id = id;
        var subject = document.getElementsByName('subject')[0].value;
        var message = document.getElementsByName('message')[0].value;
        var email = document.getElementById('email').value;
        $.ajax({  
             type: "post", 
             url:"<?php echo base_url(); ?>panel/mails/send", 
             data: {id:id, subject:subject, message:message, email:email}, 
             cache: false,
             beforeSend:function(html)
             {
                document.getElementById('answer').innerHTML = '<p class=""><i class="fas fa-spinner fa-pulse loader"></i></p>';
             },
             complete:function(html)
             {
                 console.log(html);
                document.getElementById('answer').innerHTML = '<p class="text-success"><i class="fas fa-check"></i> Odpowiedź została wysłana!</p>';
             }  
        });  
      }
    </script>