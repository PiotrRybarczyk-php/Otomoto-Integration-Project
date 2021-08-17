function clear_box(number_box) {
    document.getElementById('photoViewer_' + number_box).innerHTML = '<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/128x128" alt="">';
    document.getElementById('name_photo_'+number_box).value = 'usunięte';
}