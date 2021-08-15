<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>7.3</title>
    </head>
    <body>
        <?php
        $str = 'Hello World';
       
        // ваш код функції myStrShuffle пишіть нижче
      
       function  myStrShuffle(string $str): string
        {
            $array_str = str_split($str);
            shuffle($array_str);
            return join($array_str);
        }

        // var_dump( myStrShuffle( $str ) ); // "owldrHlelo "
        $a = hrtime (true) ;
        var_dump( myStrShuffle( $str ) );
        $b = hrtime (true);
        echo ("<br/>");
        echo ($b-$a);
        echo ("<br/>");

        //implemented function        
        $c = hrtime (true);
        echo str_shuffle($str);
        $d = hrtime (true);
        echo ("<br/>");
        echo ($d - $c);

        ?>
    </body>
</html>