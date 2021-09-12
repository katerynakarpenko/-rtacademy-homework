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

    return true;
  }

  function fileGetUaCities ( string $path ) :array {
    if (! file_exists( $path )) {
      echo ('Error: file doesn\'t exist' );
      return false;
    }

    if (!($handle = fopen( $path, 'r' ))) {
      echo ('File doesn\'t open');
      return false;
    }

    $ukrainianCities = [];

    while (($row = fgetcsv( $handle, 0 , ',')) !== false ) {
      if ( $row[3] == 'Ukraine' ) {
        $ukrainianCities[] =
                [
                  'city'       => (string)( $row[0] ),
                  'country'    => (string)( $row[3] ),
                  'population' => (int)( $row[4] ),
                  'latitude'   => (float)( $row[1] ),
                  'longitude'  => (float)( $row[2] ),
                ];
      }
    }
    fclose( $handle );
    return $ukrainianCities;
  }

  function sortCitiesByName( array $cities, string $key ): array
{
    $names = array_column( $cities, $key );
    array_multisort( $names, SORT_ASC, $cities );
    return $cities;
}
  

  function createHtml (string $newFilePath , array $countryCities) :bool {
    
    $htmldocFirst = '
            <!DOCTYPE html>
            <html>
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title> Homework-7.8| Ukrainian Cities </title>
              
              </head>
              <body>
                <table style="border:1px solid #000; magin: 0 auto"> 
                <tr style="border:1px solid #000; font-size:20px; text-align:left" >
                  <th>City</th>
                  <th>Population</th>
                  <th>Coordinates</th>
                </tr>';

  $htmldocSecond = '
            </table>
          </body>
        </html>';

    if (!($handle = fopen( $newFilePath, 'w' ))) {
      echo ('File doesn\'t open');
        return false;
    }

    fwrite( $handle, $htmldocFirst );
    
    foreach ( $countryCities as $City) {
      fwrite( $handle, 
        '<tr>
          <td>'.$City['city'].'</td>
          <td>'.$City['population'].'</td>
          <td>'.$City['latitude'].','.$City['longitude'].'</td>
        </tr>'
      );
    }

    fwrite( $handle, $htmldocSecond );
    fclose( $handle );
    chmod( $newFilePath, 0644 );
    return true;
    
  }
  function redirect( string $location ) : void {
    header( 'Location:'.$location );
  } 

  function main (){
    if( empty( $_POST ) ) {
      return;
    }
    
    $input_name = 'userfile'; 
    if( ! processUploadedFile( $input_name ) ) {
      return;
    }
  
    $citiesUa = fileGetUaCities( $_FILES['userfile']['tmp_name'] );
    if( empty( $citiesUa ) ) {
      return;
    }
  
    $citiesSort = sortCitiesByName( $citiesUa, 'city' );
    $newFilePath = 'data/cities_ukraine.html';
  
    if( ! createHtml( $newFilePath, $citiesSort ) ) {
      return;
    }
  
    redirect('/rtacadamy_homework/data/cities_ukraine.html');
  } 
  main();

?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Homework-7.8| Big Cities </title>
  </head>
  <body>
    <form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
    Файл: <input name="userfile" type="file" />
    <button type="submit">Надіслати</button>
    </form>
  </body>
</html>