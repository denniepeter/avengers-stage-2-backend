<?php
session_start();

//include(connection.php);
require('connection.php');


if(isset($_POST['submit'])){ 

 $email = $_POST['email'];
$password = $_POST['password'];
          

$query = mysqli_query($dbc, "SELECT * FROM users WHERE email ='".$email."' ");

$result = mysqli_fetch_assoc($query);
    


if ($result) {
    // output data of each row
//    $row = mysqli_fetch_assoc($query);
        //var_dump($result["email"]);
    $passwordfound = $result["password"];
    //$passwordfound = md5($passwordfound);
        
    if($passwordfound === $password){
        $username = $result["user_name"];
          $_SESSION["user_name"] = $username;
        
        $id = $result["id"];
         $_SESSION["id"] = $id;
        
       // save user id
        header('Location: index.php');
    }else{echo "user not found";
        
    }
    
} else {
   // echo 'will you like to <a href="create_event.php">CREATE AN EVENT</a> or <a href="join_event.php">JOIN AN EVENT </a>';

    echo 'please fill in correct details,  If not registered, <a href="login.php">register here</a> ';
}

  
    
//var_dump($result);
}else{
    
}

//if($numrows != 0){
//    
//    while($row = mysqli_fetch_array($query)){
//        
//        $dbuname = $row['username'];
//        $dbpass = $row['password'];
//    }
//    
//    if($username === $dbuname){
//        
//        if($password === $dbpass){
//            
//            echo "you are in";
//        }else{
//            echo "your password is wrong";
//        }
//        
//    }else{ echo "your username is incorrect";
//        
//    }}
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>create or join an event || lets have fun together</title>
    
    <link rel="stylesheet" href="style.css" />
    </head>
    <body style="background-color:aliceblue">
        <div>
            <span style="text-align:center" ><h1 class="header">RANDOM EVENT HUB</h1><br><p style="font-size:18px">create or join an event || lets have fun together</p></span>
            
        
        </div>
        <div class="login">
            <span class="subhead"><b>log in</b></span>
        
        <form action="" method="post">
            <p class="p">email: <input type="email" name="email" id="email" class="input"></p>
            <p class="p">Password: <input  type="password" name="password" id="password" class="input"></p>
            <input type="submit" name="submit" value="log in" class="submit">
            
    
        
        </form>
            
            <p class="subhead"> If not registered, <a href="login.php">register here</a></p>
        
            
        </div>
    
  
    
    
    
    
    </body>









</html>