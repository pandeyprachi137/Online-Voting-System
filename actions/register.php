<?php
include('connect.php');
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$file=$_FILES['photo'];
$fileName=$_FILES['photo']['name'];
$fileTmpName=$_FILES['photo']['tmp_name'];
$fileSize=$_FILES['photo']['size'];
$fileError=$_FILES['photo']['error'];
$fileType=$_FILES['photo']['type'];
$fileExt=explode('.',$fileName);
$fileActualExt=strtolower(end($fileExt));
$allow=array('jpeg','jpg','png');
$std=$_POST['std'];

if($password!=$cpassword){
    echo '<script>
    alert("Passwords did not match");
    window.location="../partials/registration.php";
    </script>';
}
else{
    if(in_array($fileActualExt,$allow)){
        if($fileError===0){
            if($fileSize<10000000){
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDest=
            }
        }
    }
    $sql="insert into `userData` (username,mobile,password,photo,standard,status,votes) values ('$username','$mobile','$password','$image','$std',0,0)";

    $result=mysqli_query($con,$sql);

    if($result){
        move_uploaded_file($_FILES['photo']['tmp_name'],"../uploads/".$image);
        echo '<script>
    alert("Registration successfull");
    window.location="../";
    </script>';
    }else{
        die(mysqli_error($con));
    }

}


?>