
</div><!-- br-pagebody -->
<footer class="br-footer">
  <div class="footer-left">

  </div>
  <div class="footer-right d-flex align-items-center">
    <div class="mg-b-2">Copyright &copy; <?= date('Y'); ?>. AD Awards. Wszystkie prawa zastrzeżone.<br>
    Uważnie i starannie wykonane przez AD Awards.</div>
  </div>
</footer>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="<?php echo base_url(); ?>assets/back/lib/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/popper.js/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/moment/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/peity/jquery.peity.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/back/lib/chartist/chartist.js"></script> -->
<script src="<?php echo base_url(); ?>assets/back/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/d3/d3.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/highlightjs/highlight.pack.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/select2/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/jquery-toggles/toggles.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/jt.timepicker/jquery.timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/spectrum/spectrum.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/jquery.maskedinput/jquery.maskedinput.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>assets/back/lib/summernote/summernote-bs4.min.js"></script>


<script src="<?php echo base_url(); ?>assets/back/js/bracket.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/ResizeSensor.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/back/js/dashboard.js"></script> -->
<script src="<?php echo base_url(); ?>assets/back/js/datepicker-pl.js"></script>
<?php if($this->uri->segment(3) != '' && $this->uri->segment(3) == 'form' && $this->uri->segment(2) != 'media'): ?>
<script src="<?php echo base_url(); ?>assets/back/js/loadPhoto.js"></script>
<?php endif; ?>
<script src="<?php echo base_url(); ?>assets/back/js/deletePhoto.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/preloader.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/modalGallery.js"></script>
<script src="<?php echo base_url(); ?>assets/back/js/copyLink.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js"></script>
<script src="https://cdn.tiny.cloud/1/<?= $settings->tiny ?>/tinymce/5/tinymce.min.js"></script>
<script>
  var lazyLoadInstance = new LazyLoad({
  // Your custom settings go here
});
  
  
  window.addEventListener('load', function () {
    document.getElementById('photo_logo').addEventListener('change', function () {
      document.getElementById('photoViewer_logo').innerHTML = '<i class="fas fa-spinner fa-pulse loader"></i>';

      if (this.files && this.files[0]) {
        var img = document.querySelector('img');
        img.src = URL.createObjectURL(this.files[0]);
        setTimeout(function () {
          img.onload = imageIsLoaded;
          var photoName = document.getElementById('photo_logo').value;
          document.getElementById('photoViewer_logo').innerHTML = '<img class="img-fluid img-thumbnail" src="' + img.src + '" width="64">';
          document.getElementById('name_photo_logo').value = photoName.replace(/^.*[\\\/]/, '');
        }, 500);
      }
    });
  });

  function imageIsLoaded(e) { }

  $('#datatable1').DataTable({
    responsive: true,
    language: {
      "processing":     "Przetwarzanie...",
      "search":         "Szukaj:",
      "lengthMenu":     "Pokaż _MENU_ pozycji",
      "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
      "infoEmpty":      "Pozycji 0 z 0 dostępnych",
      "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
      "infoPostFix":    "",
      "loadingRecords": "Wczytywanie...",
      "zeroRecords":    "Nie znaleziono pasujących pozycji",
      "emptyTable":     "Brak danych",
      "paginate": {
        "first":      "Pierwsza",
        "previous":   "Poprzednia",
        "next":       "Następna",
        "last":       "Ostatnia"
      },
      "aria": {
        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
      }
    },
    "columnDefs": [{
      "targets": 'no-sort',
      "orderable": false,
    }]
  });
  $('#datatable1').DataTable().on( 'draw', function () {
    copyInit();
  } );
</script>

<script>
        tinymce.init({ 
            selector:'.summernote',
            paste_as_text: true,
            plugins : 'advlist autolink link image lists charmap print preview code paste table',
            toolbar: 'undo redo | formatselect | ' +
            ' bold italic backcolor | alignleft aligncenter ' +
            ' alignright alignjustify | bullist numlist outdent indent |' +
            ' removeformat | help | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
            advlist_bullet_styles: "square",
            valid_elements : '*[*]',
            height: 500,
              setup: function (editor) {
              editor.on('change', function (e) {
              editor.save();
              });
            }
            });
    // $('.summernote').summernote({
    //   height: 250
    // })
  </script>

  <script>
    $(function(){
      'use strict'
      $(window).resize(function(){
        minimizeMenu();
      });
      minimizeMenu();
      function minimizeMenu() {
        if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
          $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
          $('body').addClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideUp();
        } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
          $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
          $('body').removeClass('collapsed-menu');
          $('.show-sub + .br-menu-sub').slideDown();
        }
      }
    });
  </script>
  <script>
    $(function(){
      'use strict'

      $('.form-layout .form-control').on('focusin', function(){
        $(this).closest('.form-group').addClass('form-group-active');
      });

      $('.form-layout .form-control').on('focusout', function(){
        $(this).closest('.form-group').removeClass('form-group-active');
      });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>

    <script type="text/javascript">
      function updateField(field, table) {
        var value = document.getElementsByName(field)[0].value;
        $.ajax({  
         type: "post", 
         url:"<?php echo base_url(); ?>panel/settings", 
         data: {field:field, value:value, table:table}, 
         cache: false,
         beforeSend:function(html) {
          document.getElementsByClassName('change')[0].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
          document.getElementsByClassName('change')[1].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
        },
        complete:function(html) {
          document.getElementsByClassName('change')[0].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
          document.getElementsByClassName('change')[1].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
        }  
      });  
      }
      function updateTextarea(field, table) {
        var value = document.getElementById(field).value;
        $.ajax({  
         type: "post", 
         url:"<?php echo base_url(); ?>panel/settings", 
         data: {field:field, value:value, table:table}, 
         cache: false,
         beforeSend:function(html) {
          document.getElementsByClassName('change')[0].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
          document.getElementsByClassName('change')[1].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
        },
        complete:function(html) {
          document.getElementsByClassName('change')[0].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
          document.getElementsByClassName('change')[1].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
        }  
      });  
      }
      function updateFieldMap(field, table) {
        var value = document.getElementsByName(field)[0].value;
        $.ajax({  
         type: "post", 
         url:"<?php echo base_url(); ?>panel/settings", 
         data: {field:field, value:value, table:table}, 
         cache: false,
         beforeSend:function(html) {
          document.getElementsByClassName('change')[0].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
          document.getElementsByClassName('change')[1].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
        },
        complete:function(html) {
          document.getElementsByClassName('change')[0].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
          document.getElementsByClassName('change')[1].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
          document.getElementById('googleMap').innerHTML = '<iframe src="'+value+'" width="100%" height="150" frameborder="0" style="border:0; margin-top: 20px;" allowfullscreen=""></iframe>';
        }  
      });  
      }
      function updateFieldPhoto(field, table) {
      	var value = document.getElementById(field);
      	var data=new FormData();
        data.append(value.name,value.files[0]);
        data.append('table',table);
        $.ajax({  
          type: "post", 
          url:"<?php echo base_url(); ?>panel/settings/photo", 
          data: data, 
          cache: false,
          contentType: false,
          processData: false,
          beforeSend:function(html) {
            document.getElementsByClassName('change')[0].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
            document.getElementsByClassName('change')[1].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
          },
          complete:function(html) {
            document.getElementsByClassName('change')[0].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
            document.getElementsByClassName('change')[1].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
          }  
        });
      }
      function updateFieldPrivace(field, table) {
      	var value = document.getElementById(field);
      	var data=new FormData();
        data.append(value.name,value.files[0]);
        data.append('table',table);
        $.ajax({  
          type: "post", 
          url:"<?php echo base_url(); ?>panel/settings/privace", 
          data: data, 
          cache: false,
          contentType: false,
          processData: false,
          beforeSend:function(html) {
            document.getElementsByClassName('change')[0].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
            document.getElementsByClassName('change')[1].innerHTML = '<span class="text-center pd-y-10 pd-x-25 tx-white"><i class="fas fa-spinner fa-pulse loader"></i></span>';
            document.getElementById('privaceTx').innerHTML = 'Polityka prywatności <i class="fas fa-spinner fa-pulse loader"></i>';
          },
          complete:function(html) {
            document.getElementsByClassName('change')[0].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
            document.getElementsByClassName('change')[1].innerHTML = '<span class="text-success pd-y-10 pd-x-25 tx-white"><i class="fas fa-check"></i> Zmiany zostały wprowadzone!</span>';
            document.getElementById('privaceTx').innerHTML = 'Polityka prywatności <i class="fas fa-check"></i>';
          }  
        });
      }
    </script>
    <script>
        window.addEventListener("load", copyInit());
    </script>
    <script>
      function setCheckbox(id, column, table) {
        let active = document.getElementById("check" + id).checked ? 1 : 0;
        $.ajax({
          type: "post",
          url: `<?php echo base_url(); ?>panel/settings/setCheckbox`,
          data: { id: id, column: column, table: table, active: active },
          cache: false,
          beforeSend: function (html) {
          console.log(html);
          },
          complete: function (html) {
          console.log(html);
          },
        });
      }
    </script>
  </body>
  </html>