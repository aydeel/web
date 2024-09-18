<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <?php

       // Azure MySQL connection parameters
        $host = 'museumhub.mysql.database.azure.com';  // Azure MySQL server name
        $username = 'aidilVMdemo';  // Azure MySQL username
        $password = 'AydeelVM110';  // Your MySQL password
        $dbname = 'museumhub';  // Name of the database you imported


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