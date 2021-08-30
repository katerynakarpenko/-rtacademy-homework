<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>7.5</title>
  </head>
  <body>
    <form method="get">
        <label for="city">Insert city name:</label>
        <input type="text" id="city" name="city" value="">
        
        <button type="submit">Send</button>
    </form>


    <?php 
      $city_raw = $_GET['city'] ?? '';

      if ($city_raw != '' )  {
        echo ('<div style="background:#a3a3a3; width: 300px;">');
        echo ('City name:' );
    
        function city_name ($str) {
          $city = strip_tags(trim($str));
          return ucfirst(strtolower($city));
        }

        echo (city_name($city_raw));
        print_r ('</div>');
      }
    ?>
  </body>
</html>