<?php
  $filepath = 'data/cities.csv';
  $newFilePath = 'data/cities.html';
  

  if (file_exists( $filepath )) {
    if ($handle = fopen( $filepath, 'r' )) {
      $bigCities = [];

      while (($row = fgetcsv( $handle, 0 , ',')) !== false ) {
          if ( $row[4] > 1000000 ) {
              $bigCities[] = $row;
          }
      }
      //var_dump( $bigCities );
      fclose( $handle );


      //file_put_contents( $newFilePath, $bigCities );

      
        if ($handle = fopen( $newFilePath, 'w' )) {

          $htmldocFirst = <<<html
          <!DOCTYPE html>
          <html>
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title> Homework-7.6| Big Cities </title>
             
            </head>
            <body>
              <table style="border:1px solid #000; magin: 0 auto"> 
              <tr style="border:1px solid #000; font-size:20px; text-align:left" >
                <th>City</th>
                <th>Country</th>
                <th>Population</th>
                <th>Coordinates</th>
              </tr>
html; 

          $htmldocSecond = <<<html
            </table>
          </body>
        </html>
html; 

        fwrite( $handle, $htmldocFirst );

          foreach ( $bigCities as $bigCity) {

            fwrite( $handle, 
            "<tr>
              <td>$bigCity[0]</td>
              <td>$bigCity[3]</td>
              <td>$bigCity[4]</td>
              <td>$bigCity[1], $bigCity[2]</td>
            </tr>"
          );
          }
          fwrite( $handle, $htmldocSecond );
          fclose($handle);
          chmod( $newFilePath, 0644 );

          header( 'Location: https://127.0.0.1/rtacadamy_homework/data/cities.html' );
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