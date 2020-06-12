
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('connection.php');
    
    $errors = array();
    
    if(empty($_POST['email'])){
        $errors[] = 'you forgot to enter your email';
    }else{
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    
    if(empty($_POST['pass'])){
        $errors[] = 'you forgot to enter your current password';
    }else{
        $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
    }
    
    if(!empty($_POST['pass1'])){
        
        if(($_POST['pass1']) != ($_POST['pass2'])){
            
            $error[] = 'your new password does not match the confirmed one';
        }else{
            
        } $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        
        
    }else{
        $errors[] = 'you forgot to enter your new password';
    }
    
    if(empty($errors)){
        $q = "SELECT id FROM users WHERE (email = '$e' AND password = '$p' )";
        $r = mysqli_query($dbc, $q); 
        $num = mysqli_num_rows($r);
        
        if($num == 1){
            $row = mysqli_fetch_array($r, MYSQLI_NUM);
            
            $q = "UPDATE users SET password = '$np' WHERE id = '$row[0]'";
             $r = mysqli_query($dbc, $q);
            
            if(mysqli_affected_rows($dbc) == 1){
                
                echo 'thanks, you have updated your password';
            }else{
                echo 'your password could not be changed';
            }
            
            mysqli_close($dbc);
        }else{
            echo 'the email and password do not match our records';
        }
    }else{
        echo'error';
            foreach($errors as $msg){
                echo $msg;
            }
    }
}









?>


<h1> change password</h1>

<form action="changepassword.php" method="post">
     <p>Email: <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}  ?>"></p>
    <p>current Password:<input type="password" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];}  ?>"></p>
    <p>new Password:<input type="password" name="pass1" value="<?php if(isset($_POST['pass1'])){echo $_POST['pass1'];}  ?>"></p>
    <p>confirm new Password:<input type="password" name="pass2" value="<?php if(isset($_POST['pass2'])){echo $_POST['pass2'];}  ?>"></p>
    <p></p><input type="submit" name="submit" value="change password">


</form>








