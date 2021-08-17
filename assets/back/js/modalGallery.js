      function openModal(photo_nr){
        $("#modal_"+photo_nr).modal();
      }
      

      function photoListener(id){
        document.querySelector('#server_photo_'+id).value = '';
      }
      
      var photo_id = 0;
      function choicePhoto(name,link, id, photo_nr){
          if( !document.querySelector('#gallery_photo'+id+'__'+photo_nr).className.includes(" border border-dark")){
            document.querySelector('#gallery_photo'+id+'__'+photo_nr).className += ' border border-dark';
          }
          if(photo_id != 0 && photo_id != id ){
            document.querySelector('#gallery_photo'+photo_id+'__'+photo_nr).classList.remove("border");

          }
          photo_id = id;
        document.querySelector('#server_photo_'+photo_nr).value = name;
        loadServerPhoto(name,link, photo_nr);
      }
      