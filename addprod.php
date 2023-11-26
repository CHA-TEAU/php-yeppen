<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
    <link rel="stylesheet" href="upload.css">

</head>
<body>

    <?
    include 'dbconnect.php';

    
    session_start();



    if($_SESSION['role'] == 'admin') {
        
        if (($_POST['send'])) {


            $name = $_POST['name'];
            $sname = $_POST['subname'];
            $price = $_POST['price'];
            $desc = $_POST['description'];
            $res = $_POST['result'];
            $lh = $_POST['lifehack'];
            $uploaddir = 'files/';
            $uploadfile = $uploaddir . basename($_FILES['Picture']['name']);
            move_uploaded_file($_FILES['Picture']['tmp_name'], $uploadfile);


            
    
            if (!empty($name) and !empty($sname)) {
                    
                    $db = DB :: dbconn();
                    $query = $db->query("INSERT INTO `goods`(`ID`, `Picture`, `Subname`, `Name`, `Price`, `Description`, `Result`, `Lifehack`) 
                    VALUES (NULL, ' $uploadfile','$sname', '$name', '$price', '$desc', '$res', '$lh')");
                  
            }

              
        }
        
        ?>



        <section class="section">
        <div class="container">

<form method="post" enctype="multipart/form-data">

    <div class="addform">
        <div class="pic-name-sub">
            
            <label for="">Name</label> <br>
            <input type="text"  name="name" class="name"><br>

            <label for="">Subname</label> <br>
            <input type="text" name="subname" class="name"> <br>

            <label for="">Price</label> <br>
            <input type="text" name="price" class="name"> <br>

            <input type="file" name="Picture" class="pic">

            
        </div>

        <div class="des-res-lh">
            <label for="">Description</label> <br>
            <textarea name="description" class="desc"></textarea> <br>

            <label for="">Result</label> <br>
            <textarea name="result" class="res"></textarea><br>

            <label for="">Lifehack</label> <br>
            <textarea  name="lifehack" class="lh"></textarea>

        </div>

        <input type="submit" name="send" class="sendbtn" value="Upload Product">

    </div>

    

</form>
</div>
        </section>
        


        

        <?
    } 
    
    ?>
    
</body>
</html>