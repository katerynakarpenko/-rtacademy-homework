<?php

function processUploadedFile(
 string $name, int $max_size = 10485760 ) : bool
{
  if( empty( $_FILES[$name] ) ) {
    echo( 'Помилка. Необхідно завантажити файл.' );
    return false;
  }

  if( $_FILES[$name]['error'] !== UPLOAD_ERR_OK ) {
    echo( 'Сталася помилка під час завантаження файлу.' );
    return false;
  }

  $valid_mimetypes = [ 'text/csv' ];
  if( !in_array( $_FILES[$name]['type'], $valid_mimetypes ) ) {
    echo( 'Помилка. Файл повинен мати формат CSV');
    return false;
  }
  
  if( $_FILES[$name]['size'] > $max_size ) {
    echo( "Помилка. Файл повинен бути менше $max_size байт." );
    return false;
  }
}

  function fileGetUaCities ( string $path ) :array {
    if (file_exists( $path )) {
      echo ('Error: file doesn\'t exist' );
      return false;
    }

    if ($handle = fopen( $path, 'r' )) {
      echo ('File doesn\'t open');
        return false;
    }

    $ukrainianCities = [];

    while (($row = fgetcsv( $handle, 0 , ',')) !== false ) {
        if ( $row[3] == 'Ukraine'  ) {
            $ukrainianCities[] = $row;
        }
    }
    fclose( $handle );

    sort( $ukrainianCities );
    return $ukrainianCities;
}

function createHtml (array $countryCities) :bool {
  $newFilePath = '../data/cities_ukraine.html';
  chmod( $newFilePath, 0644 );
  $htmldocFirst = <<<html
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title> Homework-7.8| Ukrainian Cities </title>
        </head>
        <body>
          <table> 
          <tr>
            <th>City</th>
            <th>Population</th>
            <th>Coordinates</th>
          </tr>
html;
$htmldocSecond = <<<html
            </table>
          </body>
        </html>
html;

  if (file_exists( $newFilePath )) {
    echo ('Error: file doesn\'t exist' );
    return false;
  }

  if ($handle = fopen( $newFilePath, 'r' )) {
    echo ('File doesn\'t open');
      return false;
  }

  
  fwrite( $newFilePath, $htmldocFirst );
  
  foreach ( $countryCities as $City) {

    fwrite( $newFilePath, 
      "<tr>
        <td>$City[0]</td>
        <td>$City[4]</td>
        <td>$City[1], $City[2]</td>
      </tr>"
    );
  }

  fwrite( $newFilePath, $htmldocSecond );

  fclose( $handle );
}


$tmp_path = $_FILES[$name]['tmp_name'];

processUploadedFile( $tmp_path );
fileGetUaCities($tmp_path);
createHtml($ukrainianCities);


?>
<html>
  <head>
  </head>
  <body>
    <form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
    Файл: <input name="userfile" type="file" />
    <button type="submit">Надіслати</button>
    </form>
  </body>
</html>
