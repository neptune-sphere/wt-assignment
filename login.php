<?php

    $usr = $_REQUEST['usr'];
    $pwd = $_REQUEST['pwd'];

    if($usr == null or $pwd== null){
        echo "<script> alert(\"username/password cannot be empty\") </script>";
    }else
    {

            $dbname = "localhost";
            $username="root";
            $password="root";
            $conn = new mysqli($dbname,$username,$password,"userspace");
            if($conn){
            
                $result=$conn->query("select usr,password from myuser where usr='$usr' and password='$pwd' ");
            
                $row=$result->fetch_assoc();
                    if ($row['usr']==$usr && $row['password']==$pwd){
                        echo "<script> alert(\"welcome $usr \") </script>";
                        sleep(5);
                        header("Location:index.html");
                    }
                    else{ 
                        echo "<script> alert(\"Invalid username or password\") </script>";
                }
            }
        
            else{
                echo "User doesn't exist";
            }
    }
?>