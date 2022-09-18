<?php
require './inc/header.php';
?>
<div class="content_container">
    <div class="detail-box">
        <div class="banner_main" style="margin:-5px 0 30px -21px">
            <div class="banner">
                <div class="banner_content">
                    <div class="scroll-btn"><a href="#"><img src="images/dot.png" border="0" /></a>&nbsp; <a href="#"><img src="images/dot.png" border="0" /></a>&nbsp; <a href="#"><img src="images/dot_hover.png" border="0" /></a>&nbsp; <a href="#"><img src="images/dot.png" border="0" /></a>&nbsp; <a href="#"><img src="images/dot.png" border="0" /></a></div>
                    <div class="banner_detail">
                        <div class="banner_title">How to do a Pedicure at Home</div>
                        <div class="banner_dec">Sit back and relax in one of massaging chairs and enjoy a pampering pedicure</div>
                        <div class="banner_main-points">
                            <p style="padding-right:15px;"><img src="images/arrow.png" align="absmiddle" />&nbsp;Effortlessly</p>
                            <p style="padding-right:15px;"><img src="images/arrow.png" align="absmiddle" />&nbsp;Confortable</p>
                            <p style="padding-right:15px;"><img src="images/arrow.png" align="absmiddle" />&nbsp;Naturally</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail_left-content">
            <h2>Welcome to Our Podiatry Practice</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis mauris laoreet, fringilla mauris in, posuere leo. Duis sit amet ligula pellentesque, vehicula erat eleifend, tristique orci. Curabitur cursus vestibulum risus in molestie. </p>
            <div class="new-product">
                <div class="new-product_thumb"><img src="images/1.png" /></div>
                <div class="new-product_thumb"><img src="images/2.png" /></div>
                <p class="new-pro-detail">Made from high quality 4 way stretch breathable neoprene laminate with soft feel nylon fabric.</p>
                <div class="image" style="padding:15px 0px 15px 0px;">
                    <div class="readmore"><a href="#">Read more</a></div>
                </div>
            </div>
            <h5>"And our Online store has comfortable running shoes, walking shoes, foot orthotics, other footcare products"</h5>
            <div class="new-pro-feature">
                <ul>
                    <li>FREE ½ price Initial Professional Podiatry Consultation- 20 min Value $44.50</li>
                    <li>FREE ½ price Initial Professional Podiatry Consultation- 20 min Value $44.50</li>
                    <li>FREE ½ price Initial Professional Podiatry Consultation- 20 min Value $44.50</li>
                </ul>
            </div>
            <h3>Product and Brand Information</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis mauris laoreet, fringilla mauris in, posuere leo. Duis sit amet ligula pellentesque, vehicula erat eleifend, tristique orci. Curabitur cursus vestibulum risus in molestie. </p>
            <div class="image" style="padding:20px 0 0px 0">
                <div class="new-product_thumb_small"><img src="images/3.png" /></div>
                <div class="new-product_thumb_small"><img src="images/4.png" /></div>
                <div class="new-product_thumb_small"><img src="images/5.png" /></div>
                <div class="new-product_thumb_small"><img src="images/6.png" /></div>
            </div>
        </div>
        <div class="detail_right-content">
            <div class="our-service_main">
                <h2>Our Services</h2>
                <div class="services">
                    <ul>
                        <?php
                        $services = mysqli_query($con, "SELECT * FROM `services` ORDER BY `services`.`time` DESC limit 6");

                        while ($service = mysqli_fetch_assoc($services)) {
                            echo '<li><a href="#">' . $service['service_content'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="testimonial_main">
                <h2>Testimonials</h2>
                <div class="testimonial">
                    <div class="testimonial_topbg"></div>
                    <?php
                    $testimonial = mysqli_query($con, "SELECT * FROM `testimonial` limit 2");

                    while ($testimonials = mysqli_fetch_assoc($testimonial)) {
                    ?>
                        <div class="testimonial_middlebg">
                            <p><?php
                                echo $testimonials['testimonial_content'];
                                ?></p>
                            <div class="client-name"><img src="images/line.png" align="absmiddle" /> &nbsp;
                                <?php

                                echo $testimonials['testimonial_auth'];
                                ?></div>
                        </div>
                        <div class="testimonial_bottombg"></div>
                </div>
            <?php
                    }
            ?>
            <div class="readmore"><a href="page.php?page=Testimonials">Read more</a></div>
            </div>

        </div>
        <div class="detail-box">
            <div class="ourproduct_title">
                <h2 style="width:845px; float:left;">Foot Care Products</h2>
                <div class="readmore"><a href="page.php?page=Footcare">Read more</a></div>
            </div>

                <div class="ourproduct_main">
                    <?php
                    $footcare = mysqli_query($con, "select * from product where product_category like '%footcare%' limit 4;");

                    while ($fetch_product = mysqli_fetch_assoc($footcare)) {

                    ?>
                        <div class="product-box" style="padding-left:0px;">
                            <div class="ourproduct_thumb"><img src="images/<?php echo $fetch_product['product_image'] ?>" /></div>
                            <div class="ourproduct-title"><a href="#"><?php echo $fetch_product['product_name'] ?></a></div>
                            <div class="ourproduct-price-main">
                                <div class="ourproduct-price"><?php echo $fetch_product['product_price'] ?></div>
                                <div class="cart-btn">
                                    <div onclick="return add_cart(<?php echo $fetch_product['product_id'] ?>);"><img src="images/cart-btn.png" border="0" onmouseout="this.src='images/cart-btn.png'" onmouseover="this.src='images/cart-btn_hover.png'" /></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php
require './inc/footer.php';
?>