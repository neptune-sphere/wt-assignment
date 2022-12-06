<?php
    $newusr=$_REQUEST['newusr'];
    $newpwd=$_REQUEST['newpwd'];
    $flag=true;

    if($newusr==null || $newpwd==null){
        // echo "<script> alert(\"username/password cannot be empty \")</script>";
        echo "cant be empty";
    }
    else{
        $name="localhost";
        $user="root";
        $pass="root";
        $conn=new mysqli($name,$user,$pass,"userspace");
        if($conn){

            $result=$conn->query("select * from myuser");
            while($row=$result->fetch_assoc()){
                if($row['usr']==$newusr){
                    echo "the username is already taken!";
                    $flag=false;
                    break;
                }
                
            }
            if($flag){
                $conn->query("insert into myuser values('$newusr','$newpwd')");
                echo "user created successfully!";
                sleep(5);
                header("Location:index.html");
            }
        }
        
        else{
                echo "not connected!";
            }
    }

    
?>