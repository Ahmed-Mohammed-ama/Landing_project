<?php
include("include/header.php");
require_once("include/SessionCall.php");
require_once __DIR__ . ("/include/autoload.php");
require_once("include/db.php")
?>



     <!-- Start of services page -->
     <section class="services" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto tempora accusamus, odio fugiat soluta
                    optio?</p>
            </div>

            <ul class="products">
                <div >
                        <?php
                        $product=new clsDatabase($connection);
                        $product=$product->table("products")->select()->get();
                        if(!empty($product)){
                            foreach($product as $pro){
                                if($pro['ACTIVE']==1){
                            ?>
                            <li class="product">
                        <img src="Assets/Images/productImage/<?php echo $pro['Pro_image'];?>" alt="">
                        <h3><?php echo $pro['Pro_name']?></h3>
                        <p>$<?php echo $pro['Cost']?> dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>
    
                    </li>
                    <?php
                            
                            
                            }}





                        }
    
                        ?>
                    <!-- <li class="product">
                        <img src="Assets/Images/samsung-galaxy-s23-ultra-transparent-image-free-png.png" alt="">
                        <h3>S23 Ultra</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>
    
                    </li>
    
                    <li class="product">
                        <img src="Assets/Images/samsung_note_20_ultra_black_610x610.png" alt="">
                        <h3>Note 20 Ultra</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>
    
                    </li>
    
                    <li class="product">
                        <img src="Assets/Images/Sam/S22.jpg" alt="">
                        <h3>S22</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>
    
                    </li>
              
            </div>
            <a href="Samsung.php" class="seemore">See More</a>


            <div >
                <li class="product">
                <img src="Assets/Images/Iphone/Iphone 11 pro max .png" alt="">
                <h3>Iphone 11 pro max</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>

            </li>

            <li class="product">
                <img src="Assets/Images/Iphone/Iphone 12 pro max .jpg" alt="">
                <h3>Iphone 12 pro max</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>

            </li>

            <li class="product">
                <img src="Assets/Images/Iphone/IPhone 14 pro max .jpeg" alt="">
                <h3>IPhone 14 pro max</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>

            </li>
            </div>
            <a href="Apple.php" class="seemore">See More</a>


            <div >
                <li class="product">
                    <img src="Assets/Images/Oneplus/Oneplus 10 pro .png" alt="">
                    <h3>Oneplus 10 pro</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>

                </li>

                <li class="product">
                    <img src="Assets/Images/Oneplus/Oneplus 12 .png" alt="">
                    <h3>Oneplus 12</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>

                </li>

                <li class="product">
                    <img src="Assets/Images/Oneplus/Oneplus 11.png" alt="">
                    <h3>Oneplus 11</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ad, molestiae consectetur illo enim possimus.</p>

                </li> -->
            </div>
            
            <!-- <a href="One plus.php"  class="seemore">See More</a> -->
            <!-- <a href="#"  class="seemore">See More</a> -->
            </ul>

        </div>










    </section>






    <?php

include("include/footer.php");
?>


</body>
</html>