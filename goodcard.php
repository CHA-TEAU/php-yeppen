<?php
session_start();
include 'dbconnect.php';

if($_GET)
{
    $id = $_GET['id'];
    $db = DB :: dbconn();
            
        $query = $db -> query("SELECT * FROM `goods` WHERE `ID` = '$id'");
        $row = $query -> fetch_assoc();
        
           
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good</title>
    <link rel="stylesheet" href="goodcard.css">
</head>
<body>
    

<header>
        <div class="container">

            <nav class="navigation">
                <button class="logo" id="logo">YEPPEN <strong id="sub-logo">professional skin care</strong></button>
               


                <div class="nav-icons">
                
                <?
                    if ($_SESSION['role'] == 'admin') {
                        ?><a href="admin.php"><ion-icon name="person-circle-outline"></ion-icon></a> <?;
                    }
                            
                            
                ?>

                    <input class="search" type="search" placeholder="Search">
                    <a href="#"><ion-icon name="heart-outline"></ion-icon></a>
                    <a href="#"><ion-icon name="cart-outline"></ion-icon></a>
                </div>


            </nav>

        </div>

    </header>


    <section class="section">
        <div class="container">
            <div class="product-content">
                <div class="product-pic">
                    <img src=<?=$row['Picture']?> alt="">
                </div>

                <div class="product-info">
                    <div class="title">
                        <h1><?=$row['Name']?></h1>
                        <span><?=$row['Subname']?></span>
                    </div>

                    <div class="desc-points">
                        <div class="info-block">
                            <h4 class="info-title">Description</h4>
                            <p class="info-text"><?=$row['Description']?></p>

                            <h4 class="info-title">Result</h4>
                            <p class="info-text"><?=$row['Result']?></p>

                            <h4 class="info-title">Lifehack</h4>
                            <p class="info-text"><?=$row['Lifehack']?></p>
                        </div>

                        <button class="addtocart-btn">Add to Cart</button>
                    </div>
                    
                </div>
                
            
            </div>
        </div>
    </section>













    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>