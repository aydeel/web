<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <?php

        $hostname="localhost";

        $user_sql="root";
        $pass_sql="";

        $dbname="museumhub";

        $condb=mysqli_connect($hostname,$user_sql,$pass_sql,$dbname);

        if(!$condb)
        {
            die("failed");
        }
        else
        {
            #   echo "success";
        }


        ?>
</head>
</html>