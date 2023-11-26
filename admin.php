<?php

    session_start();
 

    include 'dbconnect.php';
    


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
                    $query = $db->query("INSERT INTO `goods`(`ID`, `Picture`, `Subname`, `Name`, `Price`, `Description`, `Result`, `Lifehack`, `Number`) 
                    VALUES (NULL, ' $uploadfile','$sname', '$name', '$price', '$desc', '$res', '$lh' , '0')");

            }


        }

        if($_POST['delete']){
            $name = $_POST['delname'];


            if (!empty($name)) {

                $db = DB :: dbconn();
                $query = $db->query("DELETE FROM `goods` WHERE `ID` = '$name'");
            
        }
        }
        
        if(isset($_POST['upd'])){ 
            $updname = $_POST['updname']; 
            $updprice = $_POST['updprice']; 
            if (!empty($updprice)) { 
                $db = DB::dbconn(); 
                $query = $db->query("UPDATE goods SET Price = '$updprice' WHERE ID = $updname"); 
            } 
        }

  
   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
    <div class="container">

        <nav class="navigation">

            <a href="goodslist.php" class="logo" id="logo">YEPPEN</a>
           
            <div class="nav-icons">

                <input class="search" type="search" placeholder="Search">
                <a href="#"><ion-icon name="heart-outline"></ion-icon></a>
                <a href="#"><ion-icon name="cart-outline"></ion-icon></a>
            </div>
        </nav>
    </div>
    
</header>


<section class="section">

        <div class="admin-panel">

            <div class="admin-usage">
                <h5 id="upp">Upload Goods</h5>
                <h5 id="del">Delete Goods</h5>
                <h5 id="upd">Update Goods</h5>
                <h5 id="info">Info</h5>
            </div>

            <div class="admin-interface" id="list">
                <!-- UPLOAD PROD -->
                <form method="post" enctype="multipart/form-data" class = "addprod">
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





                <!-- DELETE PROD -->

                <form method="post" class="delprod">
                    <div class="addform">
                        <div class="delform">
            
                            <label for="">Delete</label> <br>
                            <select name="delname">
                            <?
                                $db = DB :: dbconn();
                                $query = $db->query("SELECT * FROM `goods`");
                                while ($row = $query->fetch_assoc()) {
                            ?>
                                <option value="<?=$row['ID']?>" class="nameDel"><?=$row['Subname']?></option>

                                <?}?>
                            </select> <br>
                            <input type="submit" name="delete" class="sendbtn" value="Delete Product">
            
                        </div>
                    </div>    

                </form>


                <!-- UPDATE INFO -->

                <form method="post" class="updprod">
                    <div class="addform">
                        <div class="updform">
            
                            <label for="">Update</label> <br>
                            <div class="upd-container">
                                <select name="updname">
                                <?
                                    $db = DB :: dbconn();
                                    $query = $db->query("SELECT * FROM `goods`");
                                    while ($row = $query->fetch_assoc()) {
                                ?>
                                    <option value="<?=$row['ID']?>" class="name"><?=$row['Subname']?></option>

                                    <?}?>
                                </select>
                                <input type="text" name="updprice" class="price" placeholder="$$$">
                            </div> <br>
                            
                            <input type="submit" name="upd" class="sendbtn" value="Update Price">
            
                        </div>
                    </div>    

                </form>

                <!-- SHOW INFO -->
                <?
                    $db = DB :: dbconn();
                    $query = $db->query("SELECT * FROM `goods`");
                    while ($row = $query->fetch_assoc()) {
                ?>

                     <table border = 1 id="info-table" class="info-table">
                       

                        <tr>
                        <td>
                        <?=$row['Name']?>
                        </td>
                        </tr>

                        <tr>
                        <td>
                        <?=$row['Subname']?>
                        </td>
                        </tr>

                        <tr>
                        <td>
                        <?=$row['Number']?> 
                        </td>
                        </tr>
                      
                  
                    </table>

                <?}?>
                

            </div>

            <div class="admin-profile">

                    <div class="prof-pic">
                        <?
                        ?><img src="<?=$_SESSION['avatar']?>" alt=""><?
                        ?>
                        <div class="prof-info">
                            <? if($_SESSION['login'] != NULL){
                                ?> <h3><? echo $_SESSION['login']?></h3> <?
                            }
                           ?>
                            <p>Status: <? echo $_SESSION['role']?> </p>
                            

                        </div>
                    </div>

            </div>

        </div>

</section>



<script src="admin.js"></script>    
<script src="jquery-3.7.1.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>