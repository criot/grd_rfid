<?php  
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
   
   include 'connection.php';

   if (empty($_POST)) {
    $_POST = json_decode(file_get_contents("php://input"), true) ? : [];
}

if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $query="SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'";  
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_row($res);
    if($row!=0)  {  

        $myObj = new \stdClass();
        $myObj->name = $row[3];
        $myObj->age = $row[0];
        $myObj->status = true;

        echo json_encode($myObj);
    } else {  
        $myObj = new \stdClass();
        $myObj->status = false;
        echo json_encode($myObj);
    } 
} else {
    $myObj = new \stdClass();
    $myObj->status = false;
    echo json_encode($myObj);}

?>  