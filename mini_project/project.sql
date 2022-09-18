-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 08:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `prd_image` varchar(255) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_qty` int(11) NOT NULL DEFAULT 1,
  `prd_price` double NOT NULL,
  `u_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prd_id`, `prd_image`, `prd_name`, `prd_qty`, `prd_price`, `u_id`, `time`) VALUES
(21, 1, '2.png', 'SHOES', 2, 5000, 6, '2022-06-14 05:24:57'),
(22, 4, '2.png', 'SOCKS', 2, 1500, 6, '2022-06-14 05:25:32'),
(23, 3, '1.png', 'insert', 1, 10, 6, '2022-06-14 05:25:19'),
(43, 2, '4.png', 'FOOTWEAR', 1, 10000, 2, '2022-06-15 12:56:47'),
(44, 1, '2.png', 'SHOES', 2, 5000, 2, '2022-06-15 13:58:31'),
(103, 3, '1.png', 'insert', 10, 10, 13, '2022-06-18 07:58:56'),
(107, 1, '2.png', 'SHOES', 3, 5000, 0, '2022-06-30 05:47:15'),
(108, 1, '5.png', 'SHOES', 3, 5000, 12, '2022-06-20 06:35:07'),
(109, 2, '4.png', 'FOOTWEAR', 1, 10000, 12, '2022-06-20 06:36:34'),
(110, 3, '1.png', 'insert', 1, 10, 12, '2022-06-20 06:36:37'),
(111, 4, '2.png', 'SOCKS', 1, 1500, 12, '2022-06-20 06:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_parent` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_name`, `category_parent`, `time`) VALUES
(2, 'Footwear', 'Footwear', 0, '2022-06-15 04:31:29'),
(3, 'Podiatry', 'podiatry', 0, '2022-06-13 06:03:41'),
(4, 'Footcare', 'footcare', 0, '2022-06-13 06:03:41'),
(6, 'Shoes', 'shoes', 2, '2022-06-13 06:05:06'),
(7, 'Men\'s Shoes', 'men-shoes', 6, '2022-06-13 06:35:26'),
(8, 'Orthotics', 'Orthotics', 0, '2022-06-13 10:33:07'),
(10, 'insert', 'insert', 0, '2022-06-13 06:27:08'),
(11, 'Main', 'Main', 0, '2022-06-13 06:38:24'),
(14, 'main-1', 'main-1', 11, '2022-06-13 06:39:53'),
(15, 'test', 'test', 11, '2022-06-15 05:25:41'),
(18, 'Appointment', 'Appointment', 0, '2022-06-18 06:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `customer_queries`
--

CREATE TABLE `customer_queries` (
  `query_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `cutomer_email` varchar(255) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `query` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_queries`
--

INSERT INTO `customer_queries` (`query_id`, `customer_name`, `cutomer_email`, `customer_number`, `query`, `time`) VALUES
(14, 'Cust Name', 'cust@gmail.com', '1234567890', 'Hey,\r\n\r\nCan I have some discount on purchase products worth 1 lakh /-Rs or more?', '2022-06-28 08:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_position` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_position`, `time`) VALUES
(1, 'Home,Online store,About Us,DeliveryReturns,Testimonials', 'main_nav', '2022-06-20 11:39:47'),
(2, 'Footwear,podiatry,footcare,Orthotics,Complete Rewards,Contact,Appointments,cart', 'sub_nav', '2022-06-20 12:20:40'),
(3, 'Home,Online store,DeliveryReturns,Blog,Testimonials', 'main_footer', '2022-06-20 11:44:53'),
(4, 'Help,Privacy Policy,Terms of Service,Copyright,Trademark', 'sub_footer', '2022-06-20 11:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `billing_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `number` varchar(20) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `tot_ammount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `username`, `billing_address`, `shipping_address`, `number`, `payment_mode`, `product_name`, `product_quantity`, `tot_ammount`, `status`, `time`) VALUES
(1, '13', 'Random', 'd', 'ds', '23', 'COD', 'insert,SHOES', '5,1', 5959, 0, '2022-06-17 09:14:12'),
(2, '13', 'Random', 'TEST', 'TEST', '1234567890', 'COD', 'SHOES,FOOTWEAR,insert,SOCKS', '5,4,3,2', 80276, 2, '2022-06-20 06:33:10'),
(3, '13', 'UPDATE', '123', '123', '1234567890', 'UPI', 'SHOES,FOOTWEAR,insert,SOCKS', '15,5,10,5', 156468, 1, '2022-06-20 06:39:06'),
(4, '12', 'TEST', 'Rajkot', 'Rajkot', '1234567890', 'NB', 'SHOES', '3', 17700, 1, '2022-06-20 06:40:44'),
(5, '12', 'TEST', 'test', 'test', '134567980', 'UPI', 'SHOES,FOOTWEAR,insert,SOCKS', '3,1,1,1', 31282, 3, '2022-06-20 06:41:05'),
(6, '12', 'TEST', '', '', '', 'COD', 'SHOES,FOOTWEAR,insert,SOCKS', '3,1,1,1', 31282, 0, '2022-06-21 13:52:14'),
(7, '12', 'TEST', '', '', '', 'COD', 'SHOES,FOOTWEAR,insert,SOCKS', '3,1,1,1', 31282, 0, '2022-06-21 13:54:54'),
(8, '12', 'TEST', '', '', '', 'COD', 'SHOES,FOOTWEAR,insert,SOCKS', '3,1,1,1', 31282, 0, '2022-06-21 13:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_content` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_name`, `page_content`, `time`) VALUES
(1, 'Home', '<div class=\"banner_main\">\r\n        	<div class=\"banner\">\r\n            	<div class=\"banner_content\">\r\n                	<div class=\"scroll-btn\"><a href=\"#\"><img src=\"images/dot.png\" border=\"0\" /></a>&nbsp; <a href=\"#\"><img src=\"images/dot.png\" border=\"0\" /></a>&nbsp; <a href=\"#\"><img src=\"images/dot_hover.png\" border=\"0\" /></a>&nbsp; <a href=\"#\"><img src=\"images/dot.png\" border=\"0\" /></a>&nbsp; <a href=\"#\"><img src=\"images/dot.png\" border=\"0\" /></a></div>\r\n                    <div class=\"banner_detail\">\r\n                    	<div class=\"banner_title\">How to do a Pedicure at Home</div>\r\n                        <div class=\"banner_dec\">Sit back and relax in one of massaging chairs and enjoy a pampering pedicure</div>\r\n                        <div class=\"banner_main-points\">\r\n                        	<p style=\"padding-right:15px;\"><img src=\"images/arrow.png\" align=\"absmiddle\" />&nbsp;Effortlessly</p><p style=\"padding-right:15px;\"><img src=\"images/arrow.png\" align=\"absmiddle\" />&nbsp;Confortable</p><p style=\"padding-right:15px;\"><img src=\"images/arrow.png\" align=\"absmiddle\" />&nbsp;Naturally</p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"detail-box\">\r\n        	<div class=\"detail_left-content\">\r\n            	<h2>Welcome to Our Podiatry Practice</h2>\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis mauris laoreet, fringilla mauris in, posuere leo. Duis sit amet ligula pellentesque, vehicula erat eleifend, tristique orci. Curabitur cursus vestibulum risus in molestie. </p>\r\n                <div class=\"new-product\">\r\n                	<div class=\"new-product_thumb\"><img src=\"images/1.png\" /></div>\r\n                    <div class=\"new-product_thumb\"><img src=\"images/2.png\" /></div>\r\n                    <p class=\"new-pro-detail\">Made from high quality 4 way stretch breathable neoprene laminate with soft feel nylon fabric.</p>\r\n                  <div class=\"image\" style=\"padding:15px 0px 15px 0px;\">\r\n                   	  <div class=\"readmore\"><a href=\"#\">Read more</a></div>\r\n                  </div>\r\n                </div>\r\n                <h5>\"And our Online store has comfortable running shoes, walking shoes, foot orthotics, other footcare products\"</h5>\r\n                <div class=\"new-pro-feature\">\r\n                	<ul>\r\n                    	<li>FREE ½ price Initial Professional Podiatry Consultation- 20 min Value $44.50</li>\r\n                        <li>FREE ½ price Initial Professional Podiatry Consultation- 20 min Value $44.50</li>\r\n                        <li>FREE ½ price Initial Professional Podiatry Consultation- 20 min Value $44.50</li>\r\n                    </ul>\r\n                </div>\r\n                <h3>Product and Brand Information</h3>\r\n                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer quis mauris laoreet, fringilla mauris in, posuere leo. Duis sit amet ligula pellentesque, vehicula erat eleifend, tristique orci. Curabitur cursus vestibulum risus in molestie. </p>\r\n                <div class=\"image\" style=\"padding:20px 0 0px 0\">\r\n                	<div class=\"new-product_thumb_small\"><img src=\"images/3.png\" /></div>\r\n                	<div class=\"new-product_thumb_small\"><img src=\"images/4.png\" /></div>\r\n                	<div class=\"new-product_thumb_small\"><img src=\"images/5.png\" /></div>\r\n                	<div class=\"new-product_thumb_small\"><img src=\"images/6.png\" /></div>\r\n                </div>\r\n            </div>\r\n            <div class=\"detail_right-content\">\r\n            	<div class=\"our-service_main\">\r\n                	<h2>Our Services</h2>\r\n                    <div class=\"services\">\r\n                    	<ul>\r\n                        	<li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                           	<li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                            <li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                            <li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                            <li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                            <li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                            <li><a href=\"#\">PODIATRY NAIL AND SKIN CARE PROBLEMS</a></li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n                <div class=\"testimonial_main\">\r\n                	<h2>Testimonials</h2>\r\n                    <div class=\"testimonial\">\r\n                    	<div class=\"testimonial_topbg\"></div>\r\n                        <div class=\"testimonial_middlebg\">\r\n                        	<p>“Nulla ut lobortis massa. Nam viverra nec augue in hendrerit  Maecenas commodo vestibulum mi, sit amet tristique”</p>\r\n                            <div class=\"client-name\"><img src=\"images/line.png\" align=\"absmiddle\" /> &nbsp;MIchles</div>\r\n                        </div>\r\n                        <div class=\"testimonial_bottombg\"></div>\r\n                    </div>\r\n                    <div class=\"testimonial\">\r\n                    	<div class=\"testimonial_topbg\"></div>\r\n                        <div class=\"testimonial_middlebg\">\r\n                        	<p>“Nulla ut lobortis massa. Nam viverra nec augue in hendrerit  Maecenas commodo vestibulum mi, sit amet tristique”</p>\r\n                            <div class=\"client-name\"><img src=\"images/line.png\" align=\"absmiddle\" /> &nbsp;MIchles</div>\r\n                        </div>\r\n                        <div class=\"testimonial_bottombg\"></div>\r\n                    </div>\r\n                    <div class=\"readmore\"><a href=\"#\">Read more</a></div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"detail-box\">\r\n        	<div class=\"ourproduct_title\">\r\n            	<h2 style=\"width:854px; float:left;\">Foot Care Products</h2><div class=\"readmore\"><a href=\"#\">Read more</a></div>\r\n             </div>\r\n             <div class=\"ourproduct_main\">\r\n             	<div class=\"product-box\" style=\"padding-left:0px;\">\r\n                	<div class=\"ourproduct_thumb\"><img src=\"images/1.png\" /></div>\r\n                    <div class=\"ourproduct-title\"><a href=\"#\">Epitact Corrective Bunion Orthosis</a></div>\r\n              <div class=\"ourproduct-price-main\">\r\n                    	<div class=\"ourproduct-price\">$15.00 </div>\r\n                        <div class=\"cart-btn\"><a href=\"#\"><img src=\"images/cart-btn.png\" border=\"0\" onmouseout=\"this.src=\'images/cart-btn.png\'\" onmouseover=\"this.src=\'images/cart-btn_hover.png\'\" /></a></div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"product-box\">\r\n                	<div class=\"ourproduct_thumb\"><img src=\"images/1.png\" /></div>\r\n                    <div class=\"ourproduct-title\"><a href=\"#\">Epitact Corrective Bunion Orthosis</a></div>\r\n              <div class=\"ourproduct-price-main\">\r\n                    	<div class=\"ourproduct-price\">$15.00 </div>\r\n                        <div class=\"cart-btn\"><a href=\"#\"><img src=\"images/cart-btn.png\" border=\"0\" onmouseout=\"this.src=\'images/cart-btn.png\'\" onmouseover=\"this.src=\'images/cart-btn_hover.png\'\" /></a></div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"product-box\">\r\n                	<div class=\"ourproduct_thumb\"><img src=\"images/1.png\" /></div>\r\n                    <div class=\"ourproduct-title\"><a href=\"#\">Epitact Corrective Bunion Orthosis</a></div>\r\n              <div class=\"ourproduct-price-main\">\r\n                    	<div class=\"ourproduct-price\">$15.00 </div>\r\n                        <div class=\"cart-btn\"><a href=\"#\"><img src=\"images/cart-btn.png\" border=\"0\" onmouseout=\"this.src=\'images/cart-btn.png\'\" onmouseover=\"this.src=\'images/cart-btn_hover.png\'\" /></a></div>\r\n                    </div>\r\n                </div>\r\n                <div class=\"product-box\" style=\"padding-right:0px; border:none;\">\r\n                	<div class=\"ourproduct_thumb\"><img src=\"images/1.png\" /></div>\r\n                    <div class=\"ourproduct-title\"><a href=\"#\">Epitact Corrective Bunion Orthosis</a></div>\r\n              <div class=\"ourproduct-price-main\">\r\n                    	<div class=\"ourproduct-price\">$15.00 </div>\r\n                        <div class=\"cart-btn\"><a href=\"#\"><img src=\"images/cart-btn.png\" border=\"0\" onmouseout=\"this.src=\'images/cart-btn.png\'\" onmouseover=\"this.src=\'images/cart-btn_hover.png\'\" /></a></div>\r\n                    </div>\r\n                </div>\r\n</div>\r\n             </div>', '2022-06-13 08:04:51'),
(2, 'About Us', '<p>We are Comfort feet co.<br>We communicates our experienced doctors.<br>Contact no 1234567890<br>Email ID: comfortfeet.UK@gmail.com<br>Address: Greater Noida, UP</p>', '2022-06-10 13:59:54'),
(7, 'Complete Rewards', '<p>Get Treatment before 1st february to get 35% OFF Discount</p>', '2022-06-10 13:28:01'),
(8, 'Contact', ' <form action=\"../db_operation/db_operation.php?contact\" method=\"POST\" onsubmit=\"return cust_query()\"><br><br><br>            \r\n            <input type=\"text\" name=\"name\" id=\"username\" class=\"form-control\" placeholder=\"Enter Your Name\"/><br><br>\r\n            \r\n            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control\" onkeyup=\"emailvalid();\" placeholder=\"Enter Your Email\"/><br>\r\n            <label id=\"err_email\" style=\"color: red\"></label><br/>\r\n            \r\n            <input type=\"number\" name=\"number\" id=\"mobile\" class=\"form-control\" placeholder=\"Enter Your Phone Number\"/> <br>\r\n            <label id=\"err_mobile\" style=\"color: red\"></label><br/>\r\n            \r\n           <textarea rows=\"8\" class=\"form-control\" id=\"msg\" name=\"query\" placeholder=\"Enter Query\"></textarea>\r\n            <button style=\"color: #fff;background-color: #57B657;border-color: #57B657;padding: 8px; margin: 13px 25px; border-radius: 6px;\" type=\"submit\" name=\"submit\">Send now</button>\r\n        </form>', '2022-06-18 07:47:34'),
(9, 'Appointments', '<p>Scheduled Your Appointment by In just One click for door to door treatment from us</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"data:image/png;base64,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\"></p>', '2022-06-13 10:03:18'),
(10, 'Help', '<h2 style=\"margin: 0px; padding: 0px 0px 15px; font-family: ubuntu-r-webfont, Arial, Helvetica, sans-serif; font-size: 24px; color: #0054a6; font-weight: normal; background-color: #ffffff;\">FEEL FREE TO CONTACT US ON ANY TIME</h2>\r\n<p style=\"margin: 0px; padding: 0px; float: left; color: #606060; font-family: calibriregular, Arial, Helvetica, sans-serif, open_sanslight, ubuntu-r-webfont; font-size: 15px; letter-spacing: 0.5px; background-color: #ffffff;\">CALL us for help and queries. for book an appointment you can call or mail us on comfort feet official email id : comfortfeet@gmail.com</p>', '2022-06-14 09:49:58'),
(11, 'Privacy Policy', '<h1>Privacy Policy for Comfort Feet</h1>\r\n<p>At <a href=\"www.comfortfeet.com\" aria-invalid=\"true\">www.comfortfeet.com</a>, accessible from <a href=\"www.comfortfeet.com\" aria-invalid=\"true\">www.comfortfeet.com</a>, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by <a href=\"www.comfortfeet.com\" aria-invalid=\"true\">www.comfortfeet.com</a> and how we use it.</p>\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in <a href=\"www.comfortfeet.com\" aria-invalid=\"true\">www.comfortfeet.com</a>. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the&nbsp;<a href=\"https://www.termsfeed.com/privacy-policy-generator/\">TermsFeed Free Privacy Policy Generator</a>.</p>\r\n<p>&nbsp;</p>', '2022-06-20 07:09:53');
INSERT INTO `page` (`page_id`, `page_name`, `page_content`, `time`) VALUES
(12, 'Blog', '<p><span style=\"color: rgb(35, 111, 161);\"><strong>NEW ARRIVALS</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"data:image/png;base64,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\"></p>\r\n<p><br><br></p>\r\n<p>BEST FOOT CARE PRODUCTS AT THE LOWEST PRICE<br>GRAB THE DEAL NOW :)</p>', '2022-06-20 07:22:57'),
(13, 'Trademark', '<p>Disclaimer for Comfort Feet\r\nIf you require any more information or have any questions about our site\'s disclaimer, please feel free to contact us by email at blah@blah.com.\r\n\r\nDisclaimers for www.comfortfeet.com\r\nAll the information on this website - www.comfortfeet.com - is published in good faith and for general information purpose only. www.comfortfeet.com does not make any warranties about the completeness, reliability and accuracy of this information. Any action you take upon the information you find on this website (www.comfortfeet.com), is strictly at your own risk. www.comfortfeet.com will not be liable for any losses and/or damages in connection with the use of our website.</p>', '2022-06-20 07:28:04'),
(14, 'Copyright', '<p>Disclaimer for Comfort Feet\nIf you require any more information or have any questions about our site\'s disclaimer, please feel free to contact us by email at blah@blah.com. Our Disclaimer was generated with the help of the TermsFeed Free Disclaimer Generator.\n\nDisclaimers for www.comfortfeet.com\nAll the information on this website - www.comfortfeet.com - is published in good faith and for general information purpose only. www.comfortfeet.com does not make any warranties about the completeness, reliability and accuracy of this information. Any action you take upon the information you find on this website (www.comfortfeet.com), is strictly at your own risk. www.comfortfeet.com will not be liable for any losses and/or damages in connection with the use of our website.</p>', '2022-06-20 07:51:43'),
(15, 'Terms of Service', '<h2><strong>Terms and Conditions</strong></h2>\r\n<p>Welcome to <a href=\"www.comfortfeet.com\" aria-invalid=\"true\">www.comfortfeet.com</a>!</p>\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company&rsquo;s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>', '2022-06-20 07:13:00'),
(16, 'insert2', '<p>INSERT</p>', '2022-06-15 06:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_price` double NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_image`, `product_name`, `product_desc`, `product_price`, `product_category`, `time`) VALUES
(1, '5.png', 'SHOES', '<p>SHOES</p>', 5000, 'footcare', '2022-06-18 08:04:52'),
(2, '4.png', 'FOOTWEAR', '<p>FOOTWEAR&nbsp;</p>', 10000, 'footware,footcare,test', '2022-06-15 05:23:39'),
(3, '1.png', 'insert', '<p>insert</p>', 10, 'Podiatry,Orthotics,insert', '2022-06-15 04:39:05'),
(4, '2.png', 'SOCKS', '<p>BEST SOCKS EVER</p>', 1500, 'footware,footcare', '2022-06-13 10:34:48'),
(5, '6.png', 'Orthotics', '<ul style=\"list-style-type: none;\">\n<li>Orthotics</li>\n</ul>', 1500, 'Orthotics,Podiatry', '2022-06-13 11:23:10'),
(6, '6.png', 'Orthotics', '<ul style=\"list-style-type: none;\">\n<li>Orthotics</li>\n</ul>', 1500, 'Orthotics', '2022-06-13 11:15:58'),
(7, '6.png', 'Orthotics', '<ul style=\"list-style-type: none;\">\r\n<li>Orthotics</li>\r\n</ul>', 1500, 'Orthotics', '2022-06-13 11:15:41'),
(8, '4.png', 'demo', '<p>demo</p>', 500000, 'footware', '2022-06-14 11:23:43'),
(9, '4.png', 'Update ', '<p>dssa</p>', 1500, 'Footwear', '2022-06-20 07:31:03'),
(10, '4.png', 'Category ID ', '<p>CATEGORY TESTINH</p>', 15000, 'footware', '2022-06-20 07:30:27'),
(11, 'footer_bg.png', 'Category ID ', '', 15000, 'null', '2022-06-22 06:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_content` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_content`, `time`) VALUES
(3, 'PODIATRY NAIL AND SKIN CARE ', 'PODIATRY NAIL AND SKIN CARE PROBLEMS', '2022-06-13 04:31:30'),
(4, 'PODIATRY NAIL AND SKIN CARE ', 'PODIATRY NAIL AND SKIN CARE PROBLEMS', '2022-06-13 04:31:30'),
(5, 'PODIATRY NAIL AND SKIN CARE ', 'PODIATRY NAIL AND SKIN CARE PROBLEMS', '2022-06-13 04:31:30'),
(6, 'PODIATRY NAIL AND SKIN CARE', 'PODIATRY NAIL AND SKIN CARE PROBLEMS', '2022-06-13 04:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `name`, `content`, `time`) VALUES
(1, 'logo', 'main-logo.png', '2022-06-20 10:31:19'),
(2, 'copyright', 'Copyright © 2013 ComfortFeet. All Rights Reserved', '2022-06-20 10:46:10'),
(3, 'Title', 'PROJECT', '2022-06-20 10:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(100) NOT NULL,
  `testimonial_title` varchar(255) NOT NULL,
  `testimonial_content` longtext NOT NULL,
  `testimonial_auth` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_title`, `testimonial_content`, `testimonial_auth`, `time`) VALUES
(1, 'testimonial1', '“Nulla ut lobortis massa. Nam viverra nec augue in hendrerit Maecenas commodo vestibulum mi, sit amet tristique”', 'MIchles', '2022-06-13 04:52:29'),
(2, 'update one', '“Nulla ut lobortis massa. Nam viverra nec augue in hendrerit Maecenas commodo vestibulum mi, sit amet tristique”', 'update one', '2022-06-13 11:47:51'),
(4, 'TESTIMONIAL', '<p>ADD TESTIMONIAL</p>', 'REPUTE INFO SYSTEMS', '2022-06-13 11:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `name`, `email`, `password`, `role`, `time`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1, '2022-06-21 14:09:02'),
(2, 'update', 'test', 'updatetest@gmail..com', '202cb962ac59075b964b07152d234b70', 0, '2022-06-20 06:33:51'),
(3, 'test', 'update', 'updatebug@update.com', '202cb962ac59075b964b07152d234b70', 0, '2022-06-28 04:50:20'),
(12, 'TESTING', 'TEST', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2022-06-20 06:33:58'),
(13, 'admin', 'UPDATE', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 0, '2022-06-20 06:34:02'),
(17, 'test123', 'Test Check', 'test123@example.com', '202cb962ac59075b964b07152d234b70', 1, '2022-06-20 06:34:05'),
(18, 'admin', 'blah', 'blah@email,.com', '202cb962ac59075b964b07152d234b70', 0, '2022-06-20 06:34:08'),
(19, 'adminuser', 'adduser', 'adduser@email.com', '202cb962ac59075b964b07152d234b70', 0, '2022-06-18 17:01:30'),
(20, 'new_admin', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-06-18 12:40:05'),
(21, 'adduser1', 'blah', 'blah@blah.com', 'f43708ad8cd051f0e1cb169424abe8ea', 1, '2022-06-20 04:51:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_queries`
--
ALTER TABLE `customer_queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_queries`
--
ALTER TABLE `customer_queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
