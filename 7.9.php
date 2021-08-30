<?php

function processUploadedImage( 
    string $name, int $max_size = 10485760 ) : bool {
    if( empty( $_FILES[$name] ) ) {
      echo( 'Помилка. Необхідно завантажити файл.' );
      return false;
      }

    if( $_FILES[$name]['error'] !== UPLOAD_ERR_OK ) {
      echo( 'Сталася помилка під час завантаження файлу.' );
      return false;
      }

    $valid_mimetypes = [ 'image/gif', 'image/png', 'image/jpeg' ];
    if( !in_array( $_FILES[$name]['type'], $valid_mimetypes ) ) {
      echo( 'Помилка. Файл повинен мати формат JPEG/PNG/GIF');
      return false;
      }
    
    if( $_FILES[$name]['size'] > $max_size ) {
      echo( "Помилка. Файл повинен бути менше $max_size байт." );
      return false;
      }
  }

  function imageCrop (string $imagePath) :GdImage {

    $image_source_jpeg = imagecreatefromjpeg( $_FILES['userfile']['tmp_name'] );
    $image_source_png = imagecreatefrompng( $_FILES['userfile']['tmp_name'] );
    $image_source_gif = imagecreatefromgif( $_FILES['userfile']['tmp_name'] );

    if () {

    }
  }
