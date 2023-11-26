<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Psge</title>
    <link rel="stylesheet" href="reg.css">
</head>

<body>
    
    
    <?
    session_start();

    if (($_POST['reg'])) {

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    

    if (!empty($login) and !empty($pass) and !empty($role)) {
        $db = @new mysqli('localhost', 'root', '', 'shop');


        if ($db->connection_errno) {
            echo "error: " . $db->connection_errno;

            

        } else {

        
                $query = $db->query("INSERT INTO `users` (`id`, `login`, `pass`, `role`, `avatar`) VALUES (NULL, '$login', '$pass', '$role', '')");
                
                $query = $db->query("SELECT role, login FROM users WHERE login = '$login'");
                $var = $query->fetch_assoc();
                $_SESSION['role'] = $var['role'];
                $_SESSION['login'] = $var['login'];
                
                header("Location: addavatar.php");

        }
    }

}

?>


    <section>

  

        <div class="reg-input">
            <form method="post">
                <h2>Registration</h2>
                <div class="inputbox">
                    <input type="text" name="login" required>
                    <label for="">Login</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="role" required>
                    <label for="">Role</label>
                </div>

                <div class="inputbox">
                    <input type="password" name="pass" required>
                    <label for="">Password</label>
                </div>

                <input type="submit" name="reg" value="Register Now" id="reg">

                
            </form>
        </div>

    </section>
    


   
</body>


</html>
</html>