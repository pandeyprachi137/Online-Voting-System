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
$fileName=$_FILES['photo']['name'];
$fileName=$_FILES['photo']['name'];
$std=$_POST['std'];

if($password!=$cpassword){
    echo '<script>
    alert("Passwords did not match");
    window.location="../partials/registration.php";
    </script>';
}
else{

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