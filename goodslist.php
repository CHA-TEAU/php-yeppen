
<?
    session_start();
    include 'dbconnect.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods List</title>
    <link rel="stylesheet" href="goods.css">
    
</head>
<body>

    <header>
            <div class="container">
    
                <nav class="navigation">
                    <button class="logo" id="logo">YEPPEN</button>
                   
    
    
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
  

<?
    
    
        $db = DB :: dbconn();
            
        $query = $db -> query("SELECT * FROM `goods` ");

       
            ?>

            <section class="container">


                <div class="popular-items">

            <?      while ( $row = $query -> fetch_assoc())
                    {
        
            ?>

                    <div class="often-buy-item">
                        <img src=<?=$row['Picture']?> alt="">

                        <div class="titles">
                            <p><?=$row['Subname']?></p>
                            <h3><?=$row['Name']?></h3>
                            <h4><?=$row['Price']?> $</h4>
                        </div>
                        

                        <button class="addtocart-btn"><a href="/goodcard.php?id=<?=$row['ID']?>">Show More</a></button>
                    </div>

                    <img src="<?=$_SESSION['photo']?>" class="pic" alt="" >
            <?


            
    
        }
           
    
    
?>
                </div>
            
            </section>






<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>