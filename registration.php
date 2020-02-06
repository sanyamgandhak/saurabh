<?php
$username=$_POST ['username'];
$password=$_POST ['password'];
$gender=$_POST ['gender'];
$email=$_POST ['email'];
$phone=$_POST ['phone'];

if(!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phone)) {

    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="registration form";

    $conn=new mysqli($host,$dbusername,$bpassword,$dbname);

    if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'. mysqli_connect_eror());
    }else{
    $SELECT="SELECT email from register Where email =? Limit 1";
    $INSERT= "INSERT Into regiser (username,passsword,gender,email,phone) values(?,?,?,?,?)";
    $stmt=$conn->prepare($SELECT);
    $stmt->bind_param("s",$email); 
    $stmt->execute(); 
    $stmt->bind_result();
    $stmt->store_result();
    $rnum=$stmt->num_rows;
    if($rnum==0){
        $stmt->close();
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("ssssii",$username,$password,$gender,$email,$phone);
        $stmt->execute();
        echo "new record inserted sucessefully";
    }else{
        echo "someone alredy register using this email";
    }
    $stmt->close();
    $conn->close();
    }
} else{
    echo "all field are reqired";
    die();
}
?>