<?php
    $usr=$_REQUEST['usr'];
    $newpwd=$_REQUEST['newpwd'];
    $flag=true;

    if($usr==null || $newpwd==null){
        header("Location:login.html");
    }
    else{
        $name="localhost";
        $user="root";
        $pass="root";
        $conn=new mysqli($name,$user,$pass,"userspace");
        if($conn){

            $result=$conn->query("select * from myuser");
            while($row=$result->fetch_assoc()){
                if($row['usr']==$usr){ 
                    $flag=true;
                    break;
                }
                else{
                    $flag=false;
                }
                
            }
            if($flag){
                $conn->query("update myuser set password = '$newpwd' where usr = '$usr' ");
                echo "password updated successfully!";
                header("Location:index.html");
            }
            else{
                echo "user not found!";
            }
        }
            
        else{
            echo "not connected!";
        }
    }


?>