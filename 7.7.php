<?php
  $filepath = 'data/cities.csv';
  $newFilePath = 'data/cities.json';
  
  if (file_exists( $filepath )) {
    if ($handle = fopen( $filepath, 'r' )) {
      $bigCities = [];
      while (($row = fgetcsv( $handle, 0 , ',')) !== false ) {
          if ( $row[4] > 1000000 ) {
              $bigCities[] = [
                'city'       => (string)( $row[0] ?? '' ),
                'country'    => (string)( $row[3] ?? '' ),
                'population' => (int)( $row[4] ?? 0 ),
                'latitude'   => (float)( $row[1] ?? 0 ),
                'longitude'  => (float)( $row[2] ?? 0 ),
              ];
          }
      }
      fclose( $handle );

      if ($handle = fopen( $newFilePath, 'w' )) {

        $jsonVariable = json_encode( $bigCities );
        
        file_put_contents($newFilePath, $jsonVariable);

        fclose($handle);
        chmod( $newFilePath, 0644 );

        header( 'Location: https://127.0.0.1/rtacadamy_homework/data/cities.json' );
        exit;
      }

      else {
        echo ('File doesn\'t open');
      }
    }
    else {
      echo ('File doesn\'t open');
    }
  }
  else {
    echo ('Error: file doesn\'t exist' );
  }