<?php 
    $email = $_POST['email'];
    $name = $_POST['name'];
    $link = $_POST['link'];



    
    if(!empty($email) || !empty($name) || !empty($link)){
        $host = '*****';
        $dbUsername = '****';
        $dbPassword = '*******';
        $dbname = '********';
        $dbport = '*****';

        //Connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname, $dbport);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

        }else {

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $link = mysqli_real_escape_string($conn, $_POST['link']);


            $sql = "INSERT INTO `home_page_submission_form` (`email`, `name`, `link`) VALUES ('$email','$name','$link')";

            if ($conn->query($sql) === TRUE) {
                echo "New record submitted successfully, Thanks!"; 

              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

                echo '<br><br> "Link has possibly been submitted already, thank you for your cooperation!" ';
              }

            $conn->close();
        }
    } else {
        echo "All fields are required";
        die();
    }
?>