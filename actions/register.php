<?php
include('connect.php');
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$files=$_FILES['photo'];
$filename=$files['name'];
$fileerror=$files['error'];
$filetmp=$files['tmp_name'];
$fileext=explode('.',$filename);
$filecheck=strtolower(end($fileext));
$fileextstored=array('png','jpg','jpeg');
if(in_array($filecheck,$fileextstored)){
    $destinationfile='uploads/'.$filename;
}
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
                $fileDest='uploads/'.$fileNameNew;
            }
        }
    }
    $sql="insert into `userData` (username,mobile,password,photo,standard,status,votes) values ('$username','$mobile','$password','$fileDest','$std',0,0)";

    $result=mysqli_query($con,$sql);

    if($result){
        move_uploaded_file($filetmp,$destinationfile);
        echo '<script>
    alert("Registration successfull");
    window.location="../";
    </script>';
    }else{
        die(mysqli_error($con));
    }

}


?>