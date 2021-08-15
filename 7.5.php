<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>7.5</title>
    </head>
    <body>
        <form method="get">
            <label for="city">Insert city name:</label>
            <input type="text" id="city" name="city">
            
            <button type="submit">Send</button>
        </form>

        <?php
            echo( '$_GET: ' );
            print_r( $_GET );

            $city_raw = $_GET['city'];

            function city_name ($str) {
                $city = strip_tags(trim($str));

                return ucfirst(strtolower($city));
            }
            

            echo (city_name($city_raw));

        ?>
    </body>
</html>