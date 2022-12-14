<?php 
    require_once('assets/config/connect.php');
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:index.php');
    }
    $id = $_SESSION['user'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.css" />
    <link rel="stylesheet" href="assets/css/style.css">

  
    <title>Order</title>
</head>
<body>

    <?php include_once('header.php'); ?>

    <div class="position">
        <div class="test">
            <img class="image" src="assets/image/home.jpeg" alt="">
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d484.3659977823391!2d100.5067509!3d13.7832149!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29bdfded78095%3A0x21fce47dfa53e40b!2z4LiC4LmJ4Liy4Lin4LiV4LmJ4Lih4Lir4Lix4Lin4Lib4Lil4Liy4Liq4Liy4Lih4LmA4Liq4LiZ!5e0!3m2!1sth!2sth!4v1658402824918!5m2!1sth!2sth" width="670" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        </div>




        <!-- orrder -->
        <section class="placed-orders">
        <h1 class="heading">placed orders</h1>
        <div class="box-container">
            
    <form action="" method="post">
        <?php
            $select_order = $db->prepare("SELECT * FROM `orders`WHERE user_id = ?");
            $select_order->execute([$id]);
            if($select_order->rowCount() > 0){
                while($row = $select_order->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="box">
            <p >place on : <span><?php echo $row['place_on']?></span></p>
            <p>name : <span><?php echo $row['name']?></span></p>
            <p>number : <span><?php echo $row['number']?></span></p>
            <p>email : <span><?php echo $row['email']?></span></p>
            <p>address : <span><?php echo $row['address']?></span></p>
            <p>payment method : <span><?php echo $row['method']?></span></p>
            <p>your orders :<span> <?php echo $row['total_products']?></span></p>
            <p>total price : <span><?php echo $row['total_price']?> ???</span></p>
            <p>payment status :<span style="color:<?php if($row['payment_status'] == 'pending'){echo 'red';}else{echo 'green';}?>;"> <?php echo $row['payment_status']?></span></p>
        </div>
                <?php 
                }
                }else{
                     echo "<p style='text-align:center;color:red;font-size:4rem;'>no order </p>";
                }
                
                ?>
    </form>
          
        </div>
    </section>

       



    <?php include_once('footer.php')?>
    
       
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js"></script>
      
      <script src="assets/script/script.js"></script>

</body>
</html>