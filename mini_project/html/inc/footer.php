<div class="footer_main">
    	<div class="footer">
        	<div class="footer_links">
                <div class="footer_linkset">
                    	<div class="footer_linkset_title">Navigation</div>
                        <ul>
                        <?php
                       $navigation = mysqli_query($con, 'SELECT * from menu where menu_position="main_footer"');

                       while ($nav = mysqli_fetch_assoc($navigation)) {
                           $menu_name = explode(",", $nav['menu_name']);
                           foreach ($menu_name as $menu_list) {
                               echo '<li><a href="page.php?page=' . $menu_list . '">' . $menu_list . '</a></li>';
                           }
                       }


                ?>
                        </ul>
                    </div>
                <div class="footer_linkset">
                    	<div class="footer_linkset_title">Help Resources</div>
                        <ul>
                        <?php
                                $navigation = mysqli_query($con, 'SELECT * from menu where menu_position="sub_footer"');

                                while ($nav = mysqli_fetch_assoc($navigation)) {
                                    $menu_name = explode(",", $nav['menu_name']);
                                    foreach ($menu_name as $menu_list) {
                                        echo '<li><a href="page.php?page=' . $menu_list . '">' . $menu_list . '</a></li>';
                                    }
                                }
                        ?>
                        </ul>
                    </div>
                <div class="social-media">
            			<div class="footer_linkset_title" style="width:190px;">Social</div>
           		  <div class="social-media-icons"><img src="images/facebook-icon.png" align="middle" />&nbsp; Faceboook</div>
                		<div class="social-media-icons"><img src="images/twitter-icon.png" align="middle" />&nbsp; Twiter</div>
                		<div class="social-media-icons"><img src="images/youtube-icon.png" align="middle" />&nbsp; Youtube</div>
           			</div>
            </div>
        </div>
        <div class="copyright_main">
            <div class="copyright"><?php  $web_content = mysqli_query($con, "SELECT * from settings where name like 'copyright'");
    $content = mysqli_fetch_assoc($web_content); echo $content['content'] ?></div>
    </div>
</div>
<div class="clear"></div>
</div>
</body>
</html>
