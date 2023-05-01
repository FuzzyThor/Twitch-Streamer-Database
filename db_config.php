    <?php

    // Connect to the database

    $conn = mysqli_connect("localhost", "username", "password", "database");



    // Check connection

    if (!$conn) {

        die("Connection failed: " . mysqli_connect_error());

    }



  

    ?>