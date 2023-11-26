<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?
    session_start();

    if (($_POST['auth'])) {

        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (!empty($login) and !empty($pass)) {
            $db = @new mysqli('localhost', 'root', '', 'shop');


            if ($db->connection_errno) {
                echo "error: " . $db->connection_errno;

            } else {

                $query = $db->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass';");

                    if($query -> num_rows == 0){
                        echo 'no';
                    }else{
                        $var = $query -> fetch_assoc();
                        $_SESSION['role'] = $var['role'];
                        $_SESSION['login'] = $var['login'];
                        header("Location: goodslist.php");
                    }

                    

                }

            }          
        

        
        }

    ?>

    <section>

        <div class="reg-input">
            <form method="post">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="login" required>
                    <label for="">Login</label>
                </div>
                
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="pass" required>
                    <label for="">Password</label>
                </div>
                <input type="submit" name="auth" value="Log In">
                <div class="register">
                    <p>Don't have an account? <a href="reg.php">Register Now</a></p>
                </div>
        
            </form>
        </div>

    </section>

    


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>