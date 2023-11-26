<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Psge</title>
    <link rel="stylesheet" href="avatar.css">
</head>

<body>
    
    
    <?php
    session_start();
    include 'dbconnect.php';


    if($_POST['yes'])
    {
        $pic = $_SESSION['login'];
        $uploaddir = 'avatars/';
        $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);

        $db = DB :: dbconn();
        $query = $db->query("UPDATE `users` SET `avatar` = '$uploadfile' WHERE `login` = '$pic'");

        $query = $db->query("SELECT * FROM users");
                $var = $query->fetch_assoc();
                $_SESSION['avatar'] = $var['avatar'];
        
        header('Location: goodslist.php');
    }

    if($_POST['no']){

        header('Location: goodslist.php');
    }

    
?>


    <section>

  

        <div class="reg-input">
            <form method="post" enctype="multipart/form-data" class="avtform">
            
               <h2>Would you like to upload an avatar?</h2>

                <input type="file" name="avatar" id="">

                <div class="btn-container">
                    <input type="submit" value="Forward" class="btn" name="yes">
                    <input type="submit" value="No" class="btn" name="no">
                </div>
                

                
            </form>
        </div>

    </section>
    


   
</body>


</html>
</html>