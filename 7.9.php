<?php
  declare( strict_types=1 );

  function processUploadedImage( string $name, int $max_size = 10485760 ) : bool {
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

    return true;
  }

  function imageCropFile (string $imagePath) :?\GdImage {

    $file_contents = file_get_contents( $imagePath );

    if ( empty( $file_contents ) ) {
      echo("Помилка: файл $imagePath не існує");
      return null;
    }

    $image_source = imagecreatefromstring( $file_contents );

    $image_width  = imagesx( $image_source );
    $image_height = imagesy( $image_source ); 

    if( $image_width < 500 || $image_height < 500 ) {
    echo('Помилка. Розмір зображення має бути більшим за 500 px.');
    return null;
    }

    if( $image_width < $image_height ) {
      $side_4x = $image_width;
      $side_5x = (int)( 5 * $image_width / 4 );
    }
    else {
        $side_4x = (int)( 4 * $image_height / 5 );
        $side_5x = $image_height;
    }

    $image_result = imagecrop(
      $image_source,
      [
          'x'              => (int)( $image_width / 2 - $side_4x / 2 ),
          'y'              => (int)( $image_height / 2 - $side_5x / 2 ),
          'width'          => $side_4x,
          'height'         => $side_5x,
      ]
    ) ;

    if( ! $image_result ) {
      echo("Виникла помилка при вирізанні частини зображення");
      return null;
    }

    imagedestroy( $image_source ); 

    return $image_result;
  }
    

  function resizeImage( \GdImage $image_source, int $image_height = 300 ) : GdImage {
    
    $image_result = imagescale( $image_source, $image_height );

    if( ! $image_result ) {
      echo("Виникла помилка при зменшенні частини зображення");
      return null;
    }

    return $image_result;
  }

  function saveImage( \GdImage $image_source ) : bool {

    global $new_image_path;

    $new_image_path = 'data/' . microtime( true ) . '.jpg';

    if( ! imagejpeg( $image_source, $new_image_path ) ) {
      echo("Виникла помилка при збереженні нового зображення $new_image_path");
      $new_image_path = '';       
      return false;
    }

    imagedestroy( $image_source );                  

    return true;
  }


  function main() : void {
    if( empty( $_POST ) ) {
      return;
    }

    $input_name = 'image';   

    if( ! processUploadedImage( $input_name ) ) {
      return;
    }

    $image = imageCropFile( $_FILES[ $input_name ]['tmp_name'] ?? '' );

    if( !$image ) {
      return;
    }

    $image = resizeImage( $image );

    if( !$image ) {
      return;
    }

    $image = saveImage( $image );

    if( !$image ) {
      return;
    }
  }

  main();
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Homework-7.9| Upload image </title>
  </head>
  <body>
    <form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
    Файл з зображенням у форматі JPEG, PNG або GIF: <input name="image" type="file" />
    <button type="submit">Надіслати</button>
    </form>

    <?php

    if( !empty( $new_image_path ) )
    {
        echo( '<div id="image"><img src="'.$new_image_path.'" height="300" alt=""></div>' );
    }

    ?>
  </body>
</html>
