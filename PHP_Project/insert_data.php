<?php
    include('dbcon.php');
    if(isset($_POST['add_students'])){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $age = $_POST['age'];
        // $query = "insert into `students`(`f_name`, `l_name`, `age`) values('$f_name', '$l_name', '$age')";
        // $result = mysqli_query($connection, $query);
        // if(!$result){
        //     die("Query Failed" . mysqli_error($connection));
        // }
        if($f_name == "" || empty($f_name)){
            header("Location: index.php?error=First Name is required");
        }
        if($l_name == "" || empty($l_name)){
            header("Location: index.php?error=Last Name is required");
        }
        if($age == "" || empty($age) || $age<=0){
            header("Location: index.php?error=Age is required");
        }else{
            $connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
            $query = "insert into `students`(`first_name`, `last_name`, `age`) values('$f_name', '$l_name', '$age')";      
            $result = mysqli_query($connection, $query);
            if(!$result){
                die("Query Failed" . mysqli_error($connection));
            }else{
                header("Location: index.php?insert_msg=You data has been added successfully");
            }

        }
    }
?>