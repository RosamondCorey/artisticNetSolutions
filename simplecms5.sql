-- MySQL dump 10.13  Distrib 5.5.19, for Linux (x86_64)
--
-- Host: 50.63.244.80    Database: simplecms5
-- ------------------------------------------------------
-- Server version	5.0.96-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `address_id` int(11) NOT NULL auto_increment,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `address_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (40,'999 North Pacific St','Oceanside CA, 92054','Home Address');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_levels`
--

DROP TABLE IF EXISTS `administration_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_levels` (
  `userLevel` int(11) NOT NULL auto_increment,
  `levelName` text NOT NULL,
  PRIMARY KEY  (`userLevel`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_levels`
--

LOCK TABLES `administration_levels` WRITE;
/*!40000 ALTER TABLE `administration_levels` DISABLE KEYS */;
INSERT INTO `administration_levels` VALUES (1,'Super User'),(2,'Client Full Access'),(3,'Limited User');
/*!40000 ALTER TABLE `administration_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_navigation_1`
--

DROP TABLE IF EXISTS `administration_navigation_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_navigation_1` (
  `navigation_id` int(11) NOT NULL auto_increment,
  `navigation_text` text NOT NULL,
  `display_order` int(10) unsigned NOT NULL,
  `default_text` text NOT NULL,
  `hidden` set('Y','N') NOT NULL,
  `help_text` text NOT NULL,
  PRIMARY KEY  (`navigation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_navigation_1`
--

LOCK TABLES `administration_navigation_1` WRITE;
/*!40000 ALTER TABLE `administration_navigation_1` DISABLE KEYS */;
INSERT INTO `administration_navigation_1` VALUES (1,'Multi Site',5,'settings_display_text.inc.php','N','These are all the settings related to the managment of multiple sites from a single system. Please talk to me before you do much in here so that you can be trained properly before starting your journey.'),(3,'Web Site',1,'navigation_display_text.inc.php','N','This is the web site section of SimpleCMS it is used for managing all systems related to the web site.'),(6,'Administration',0,'administration_display_text.inc.php','Y','This is the administration section it is used for altering none section specific settings.<br> tacos\r\n'),(10,'Site Builder',6,'administration_display_text.inc.php','N','The Site builder is a colection of components for preforming all the tasks to create a custom web site from start to finish<br><br>'),(11,'Modules',7,'administration_display_text.inc.php','N','Please Write Help Text...');
/*!40000 ALTER TABLE `administration_navigation_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_navigation_2`
--

DROP TABLE IF EXISTS `administration_navigation_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_navigation_2` (
  `navigation_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `navigation_text` text NOT NULL,
  `aut_inc` int(10) unsigned NOT NULL auto_increment,
  `display_order` int(10) unsigned NOT NULL,
  `help_text` text NOT NULL,
  PRIMARY KEY  (`aut_inc`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_navigation_2`
--

LOCK TABLES `administration_navigation_2` WRITE;
/*!40000 ALTER TABLE `administration_navigation_2` DISABLE KEYS */;
INSERT INTO `administration_navigation_2` VALUES (1,1,'Sites',3,0,'asdfasdfasd'),(1,6,'User Administration',4,0,'This is the user administration section. It is used for altering all types of user information from first or last name to password and user permissions.<br>'),(1,3,'Navigation',5,0,'This section is for managing all of your web site navigation. This means the creation of navigation buttons where they lead to how they look and if this will be a link to a secure page or just a regular page.'),(2,6,'System Manager',11,0,'iiiii'),(3,9,'System Setting\'s',12,0,'qqqqq'),(4,9,'Client Services',20,0,'The Client Services tab contains all of the needed programs to manage a client as well as set up a job for a client. <br>'),(2,3,'Editors',13,0,'This section is a group of editors for altering all web content.'),(3,3,'Header Manager',22,0,'The Header Manager is for managing all the site page specific headers.'),(4,1,'Themes',21,0,'The Theme section is dedicated to all the settings and changes needed to be made to our sites look and feel.'),(3,1,'Settings',18,0,'This is a group of small programs that are in charge of the smaller pieces of creating multiple sites from 1 system. '),(1,10,'Component Builder',23,0,'Please Write Help Text...'),(1,11,'Simple Modules',24,0,'Please Write Help Text...');
/*!40000 ALTER TABLE `administration_navigation_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_navigation_3`
--

DROP TABLE IF EXISTS `administration_navigation_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_navigation_3` (
  `unique_key` int(11) NOT NULL auto_increment,
  `group_id` int(11) NOT NULL,
  `navigation_text` text NOT NULL,
  `module_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `sub_group` int(10) unsigned NOT NULL,
  `help_text` text NOT NULL,
  PRIMARY KEY  (`unique_key`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_navigation_3`
--

LOCK TABLES `administration_navigation_3` WRITE;
/*!40000 ALTER TABLE `administration_navigation_3` DISABLE KEYS */;
INSERT INTO `administration_navigation_3` VALUES (2,6,'Add/Remove Users',2,1,1,'2'),(3,3,'Header Navigation',3,1,1,'The header navigation builder is a simple program for the time being for adding navigation buttons to the header navigation. When you add a button you have the ability to set the text that will display on the button EXACTLY how you type it, as well as setting where that actul button will link to. '),(4,3,'Page Editor',4,1,2,'The Site Specific Editor is for editing pages that belong to a specific site. You will not see service specific or global pages in this editor at all. Please see their respective editors for this functionality.'),(20,1,'Theme Manager',14,2,4,'The Theme manager is for adding a new group of templates for a web site. Please see template manager to relate templates to themes and style sheet manager to relate style sheets to templates.'),(5,3,'Footer Navigation',3,2,1,'The footer navigation builder is a simple program for the time being allowing you to add edit and remove buttons that will show on the footer navigation. The text entered for the footer navigation button text will show up EXACTLY how you type it in. You also have the ability to reorder the buttons and change the order they will show up. '),(8,1,'City Manager',10,2,3,'This City manager is a very simple program setup to manage addition removal and alterations of citys and their relationship to countys. '),(9,1,'Phone Number Manager',10,3,3,'The Phone Number Manager is a somewhat complex program dedicated to addition removal and alteration to a phone number our company currently uses. Phone numbers have a number of properties they are as follows\r\n<ul>\r\n<li>Name (A simple name only used for the purpose of human recognition)</li>\r\n<li>Number (This is the actual phone number formated how you would like it to be displayed)</li>\r\n<li>Type(As of the second we only have bee or pest numbers more will be added once needed)</li>\r\n<li>County(This is the primary county the number is going to be used for)</li>\r\n</ul>'),(26,3,'Hero Sliders',7,2,3,'The Hero sliders program is for adding sliding or fading images sets to the top of pages. I will write more once this system has been properly tested.'),(27,10,'Header Builder',17,1,1,''),(11,1,'Site Manager',10,5,1,'Description'),(12,6,'User Permissions',2,2,1,'45345'),(13,6,'Module Manager',11,1,2,'2134'),(14,6,'Component Manager',11,2,2,'sadfsd'),(15,6,'System Navigation Editor',12,1,2,'asdfasdf'),(17,9,'Client Editor',13,1,4,'Temp'),(16,1,'County Manger',10,1,3,'The county manager is a program designed for the task of keeping track of all the countys we service. You can add remove and alter countys here. Please see the city manager to create a relationship between a city and a county.'),(18,1,'Service Manager',10,6,3,'The service manager is for adding service types. Such as Rodent Removal, Bee Removal, Rodent Control. These need to be put in the system as you would like them to show up on the web sites.'),(19,1,'Address Manager',10,7,3,'The Address Manager is designed to manage all address we have. Currently the address system only supports 3 editable fields. They are as Follows.\r\n<ul>\r\n<li>Address Name (This is simply a name to make the address easly recognizable )</li>\r\n<li>Address Line 1 (This is the street and unit number for this address)</li>\r\n<li>Address Line 2 (This is the City State and Zip code)</li>\r\n</ul>\r\nPlease remember to fill in all fields as you want them to show up on the internet.'),(21,1,'Template Manager',14,1,4,'The Template manager is for adding new template files to theme groups. Please use the style sheet manager to add style sheets to templates.'),(22,1,'Style Sheet Manager',14,3,4,'The style sheet manager is for adding style sheets to individual templates.'),(23,3,'Images',7,1,3,'This system is for uploading header images. Each header Image is related to a service type. The header will only be avalable for sites in that service type.'),(29,11,'FAQ Manager',19,1,1,'Replace when done<br>'),(31,11,'Form Manager',20,1,1,'temp'),(30,11,'Portfolio Manager',18,1,1,'');
/*!40000 ALTER TABLE `administration_navigation_3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_styles`
--

DROP TABLE IF EXISTS `administration_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_styles` (
  `module_id` int(11) NOT NULL,
  `sheet` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_styles`
--

LOCK TABLES `administration_styles` WRITE;
/*!40000 ALTER TABLE `administration_styles` DISABLE KEYS */;
INSERT INTO `administration_styles` VALUES (0,'base_styles.css'),(0,'header_styles.css'),(0,'footer_styles.css');
/*!40000 ALTER TABLE `administration_styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_user_permision`
--

DROP TABLE IF EXISTS `administration_user_permision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_user_permision` (
  `permission_id` int(10) unsigned NOT NULL auto_increment,
  `permission_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_user_permision`
--

LOCK TABLES `administration_user_permision` WRITE;
/*!40000 ALTER TABLE `administration_user_permision` DISABLE KEYS */;
/*!40000 ALTER TABLE `administration_user_permision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_users`
--

DROP TABLE IF EXISTS `administration_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(36) NOT NULL,
  `first` text NOT NULL,
  `last` text NOT NULL,
  `email` text NOT NULL,
  `userLevel` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_users`
--

LOCK TABLES `administration_users` WRITE;
/*!40000 ALTER TABLE `administration_users` DISABLE KEYS */;
INSERT INTO `administration_users` VALUES (1,'WickedFingers','682163fb36d2c4cbf0e0a993afd29f33','Corey','Rosamond','wickedfingers1984@gmail.com',1),(6,'Scotty','d332b7f02a57da93842a0e88f2f83cf9','Scott','Hernandez','superscott597@gmail.com',1);
/*!40000 ALTER TABLE `administration_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `button_class`
--

DROP TABLE IF EXISTS `button_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `button_class` (
  `class_id` int(10) unsigned NOT NULL auto_increment,
  `class_name` varchar(100) NOT NULL,
  `class_css` varchar(100) NOT NULL,
  `class_owner` set('H','F') NOT NULL,
  PRIMARY KEY  (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `button_class`
--

LOCK TABLES `button_class` WRITE;
/*!40000 ALTER TABLE `button_class` DISABLE KEYS */;
INSERT INTO `button_class` VALUES (1,'Company','company','H'),(2,'Services','services','H'),(3,'Customer','customer','H');
/*!40000 ALTER TABLE `button_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `city_id` int(10) unsigned NOT NULL auto_increment,
  `city_name` text NOT NULL,
  `county_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Oceanside',15);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `component` (
  `module_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `type` set('B','F') NOT NULL,
  `global_component_id` int(11) NOT NULL,
  `unique_key` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`unique_key`)
) ENGINE=MyISAM AUTO_INCREMENT=5001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component`
--

LOCK TABLES `component` WRITE;
/*!40000 ALTER TABLE `component` DISABLE KEYS */;
INSERT INTO `component` VALUES (1,1,'basic_text_settings.inc.php','B',1,1),(2,1,'administration_user.inc.php','B',2,2),(1,1,'footer_navigation_builder.inc.php','B',3,3),(4,1,'content_editor.inc.php','B',4,4),(3,2,'footer_navigation_builder.inc.php','B',5,5),(5,1,'content_page.inc.php','F',6,6),(6,1,'contact_us.inc.php','F',7,7),(7,1,'header_images.inc.php','B',8,8),(8,1,'site_map.inc.php','F',9,9),(9,1,'search_results.inc.php','F',10,10),(10,1,'county_manager.inc.php','B',11,11),(10,2,'city_manager.inc.php','B',12,12),(10,3,'phone_number_manager.inc.php','B',13,13),(7,2,'header_sliders.inc.php','B',31,31),(10,5,'site_manager.inc.php','B',15,15),(2,2,'permission_manager.inc.php','B',16,16),(11,1,'module_manager.inc.php','B',17,17),(11,2,'componenet_manager.inc.php','B',18,18),(3,1,'header_navigation_builder.inc.php','B',20,20),(12,1,'admin_navigation_editor.inc.php','B',19,19),(13,1,'client_screen.inc.php','B',21,21),(10,6,'service_manager.inc.php','B',22,22),(10,7,'address_manager.inc.php','B',23,23),(14,1,'template_manager.inc.php','B',24,24),(14,2,'theme_manager.inc.php','B',25,25),(14,3,'template_styles_manager.inc.php','B',26,26),(19,1,'frequently_asked_questions_main.inc.php','B',34,34),(19,2,'frequently_asked_questions_frontend.inc.php','F',35,35),(15,1,'network_view.inc.php','B',29,29),(16,1,'oops_page.inc.php','B',30,30),(17,1,'header_builder.inc.php','B',32,32),(18,1,'portfolio_main.inc.php','B',36,36),(18,2,'portfolio_frontend.inc.php','F',37,37),(20,1,'forms_main.inc.php','B',38,38),(20,2,'form_frontend.inc.php','F',39,39);
/*!40000 ALTER TABLE `component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_area`
--

DROP TABLE IF EXISTS `content_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_area` (
  `page_id` int(10) unsigned NOT NULL,
  `content_id` int(10) unsigned NOT NULL auto_increment,
  `content` text NOT NULL,
  `header` varchar(150) NOT NULL,
  `sub_header` varchar(150) NOT NULL,
  `content_display_name` varchar(150) default NULL,
  `order` int(11) default NULL,
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_area`
--

LOCK TABLES `content_area` WRITE;
/*!40000 ALTER TABLE `content_area` DISABLE KEYS */;
INSERT INTO `content_area` VALUES (240,236,'Artistic Net Solutions was built around the need for businesses to have a full-featured online identity without all the unnecessary complication of management, hosting, and updating websites through various inefficient means. To simplify this complicated process of creating and managing an online identity, we\'ve created a system that works for any project size or budget.<br><br>Stand out with a beautiful design that perfectly complements your business brand. Get noticed on search engines like Google, Bing and Yahoo through tried and true SEO practices and procedures. Get monthly updates to application architecture and site content. See your business explode in the online community.<br><br>These are the things Artistic Net Solutions does best. And it\'s all wrapped into one simple, affordable business package.<br>','ANS Services','Complete packaged solutions for serious businesses','Services',2),(241,237,'<p>We are currently under a large redesign of our site. Here is a list of the pages still under development.</p>\r\n<ul>\r\n<li>Blogs</li>\r\n<li>CMS Features</li>\r\n<li>Site Map</li>\r\n<li>Privacy</li>\r\n<li>Terms</li>\r\n</ul>\r\n<p>Thank you for your your support during the redesign.</p>\r\n','Site Re-Design In Progress','This Page Will Be Complete Soon','Coming Soon Text',NULL),(242,238,'Portfolio page coming soon','Portfolio','All works are 100% orignal',NULL,NULL),(243,239,'Here at Artistic Net Solutions, we understand the needs of businesses of any size and build scalable, dynamic web identities and applications to suit your business. specific industry needs to get ahead of the competition. With over 20 years of experience under our belts, we\'re more than qualified to handle your complex and specific web development needs. Not only will we provide a fully custom and unbelievably powerful content management platform, we will wrap your online business identity in a solid branding blanket of beautiful and engaging design.','Web Development Services','Ready to take your business to the next level?','Web Development Services',0),(244,240,'Artistic Net Solutions was created out of a desire to empower businesses with the tools they need to expand their exposure and manage their business with the most powerful tools on the net. If you\'re serious about your online efforts, look no further. With over 20 years of experience under our belts and the most powerful custom content management system under the pixelated sun, we\'re prepared to turn your business into a digital powerhouse of unconstrained proportions, and to keep that status for as long as possible.','About Artistic Net Solutions','Find out what we\'re about and where we came from.','About Main',0),(245,241,'We\'re standing by to answer any questions or concerns you may have before purchasing a plan with ANS. Fill out the form on this page or email us at support@artisticnetsolution.com and we\'ll be sure to get back to you as soon as we can. We value your contributions and hope to hear from you soon!','Contact Us','We\'re open to comments and suggestions','',NULL),(246,242,'Creating an online identity is a big deal, and no small investment. You probably have a lot of questions for us regarding pricing, features, and our qualifications. As such, we\'ve gathered the most common questions that business owners have had for us and answered them here for your quick reference.<br><br>If you have a question you would like to add, click \"Ask a Question\" and fill out the form. We will review your question and answer you directly. If it becomes a common question, we will append it to this FAQ.<br>','Frequently Asked Questions','Most common questions and concerns','',NULL),(247,243,'We\'ve been actively developing our custom content management system and we\'re excited to unveil the wealth of features we\'ll be offering once the client portal is live. For now, the CMS is used solely on the websites we create, but we plan to have a custom build ready for clients to monitor our development progress on their projects, communicate with us directly through the private system, and set up new projects - all from the same platform we build our web projects with.<br><br>This illustrates only a sliver of the possibilities with the system we\'ve created for developing and managing complex web projects. For now, use the \"Submit a Project\" link and fill out the questionnaire to request a quote on your next custom web design and/or development project.<br>','Client Login','Log in to your acount on Artistic Net Solutions','Client Portal',NULL),(240,244,'We\'re here to take care of your business\' online needs. ANS provides custom solutions for any type of project, including your online corporate identity and even company CRM architecture and interface. We\'re glad you stopped by and hope you\'ll look through our portfolio of featured projects and read more about us before starting your next project with us.<br><br>Still have questions? Visit our FAQs and services pages to quell your concerns and feel confident that ANS is the right choice for your online presence. When you\'re ready to get serious and get started with us on your next project, head on over to our questionnaire and submit your project details. We\'ll review the proposal and contact you as soon as we are able.<br>','Welcome to Artistic Net Solutions!','We empower businesses with the best solutions on the net','Home',1),(240,245,'Our pricing model was created to satisfy your needs as a business owner as well as allow ANS to provide the best design and development experience on the net. We\'ve broken our accepted projects into different tiers of development cost and complexity, and created what would be considered a huge discount compared to other design agencies.<br><br>The initial design and development of the project requires a down payment at the beginning of development and final payment at the time of completion. Since online identities are no longer static, we also require a monthly contract to ensure your platform remains the best in your industry for as long as you are partnered with us. This cost not only includes hosting and support, but site maintenance and updates, updates to the core application (which provides more security and more options for expansion in every update), discounts on future projects, and revisitation of the site design every 6 months to ensure your identity still exceeds the expectations of your industry.<br><br>For more information regarding budget ranges and monthly investments, please visit our services page.<br>','Pricing Overview','What does it cost to have the best?','Pricing',3),(249,248,'','Make it great, Make it quality','Make it simple','Features',NULL),(250,249,'','','',NULL,NULL),(251,250,'','','',NULL,NULL),(252,251,'','','',NULL,NULL),(248,247,'','','',NULL,NULL),(243,259,'While our custom content management system is our recommended way of building and managing websites, we do offer custom WordPress theme design and development. Why did we choose to specialize in WordPress, you ask? The open source giant offers a familiar, simple interface, and has one of the most robust and active open source development communities in the world. Many business owners have been exposed to the standardized WordPress interface, and those who haven\'t can familiarize themselves with the administration menus in a matter of minutes.<br><br>When we develop custom WordPress solutions, we train our clients in updating and managing their content. We also offer monthly support options, including managing the website updates for your business.<br>','','Custom WordPress Design & Development','WordPress Dev + Design',3),(243,255,'Having worked in the web design and development industry for some time now, we\'ve come to the conclusion that a website will most likely be unsuccessful if it does not keep up with the times. Unfortunately, most businesses opt for the first phase of design and development and stop there, thinking that once they have a website live their online identity is going to be an instant success. However, a website cannot reach its full potential unless it is updated with new content on a regular basis, its SEO carefully monitored and tweaked to reach peak performance, and its core updated with performance improvements to ensure the best possible experience for visitors to the site.<br>','','Monthly Updates &amp; Support','Monthly Updates',4),(253,258,'ANS operates under a strong dedication to communication and openness. \r\nThat\'s why we\'ve created this project questionnaire. Many businesses \r\naren\'t completely sure what they\'re looking for, so answering these \r\nquestions may help business owners solidify their online business plan. \r\nOther businesses know exactly what they need and want for their online \r\nidentity or product, and our questionnaire gives us most of the \r\ninformation we need to get started immediately on their project.<br><br>Regardless of what stage you\'re in with your online identity, we\'re more\r\n than happy to guide you through the process and be a resource for you \r\nas you build your company online. So fill out the questionnaire and get \r\nstarted with Artistic Net Solutions today!','Project Questionnaire','Fill out our questionnaire to get started on your project today!','Submit a Project',0),(244,256,'While Artistic Net Solutions was officially formed in 2011, its foundation has been in the works since 2007 with the inception of SimpleCMS, the powerful platform on which we build our products. Created by Corey Rosamond (ANS CTO/Co-Founder), SimpleCMS is versatile, secure, and infinitely malleable. SimpleCMS has been the backbone of websites, applications and CRMs and has proven to be user friendly, easy to update, and easy to improve. When we build websites and applications, we use SimpleCMS to customize every aspect of the interface and design.','','Powerful Tools','Powerful Tools',1),(244,257,'Although, a strong management platform won\'t do much for an online identity unless that identity can make a strong first, second -- forever impression on visitors and potential customers. To help visitors gain a preference and appreciation for your product or service, ANS brings strong, vibrant design to the table. We don\'t think in templates, because we believe that each company is unique. This belief lead us to create a business plan that provides for drastic differences in the way online interfaces are built today. Whatever your online business needs are, we create custom solutions for display and management that complement the unique aspects of your products and services.','','Beautiful Design','Beautiful Design',2),(243,252,'No more template hunting or cheap web designs for the sake of saving the moneys. Take the next step and give your busines the makeover it\'s been asking for all these years. ANS has experience building professional identites and providing custom solutions for corporate sites, media delivery sites, and personal blogging sites. So take a stab at standing out - we promise it will make your business better in the end.','','Custom Website Design','Web Design',1),(243,253,'Open source blogging platforms, complicated installation processes, oversaturated and overused templates, and endless plugin hunting can only get you so far in the effort to build an online identity. We\'ve built a content management framework that allows us to customize your page admin screens and provide a completely new content management experience. Nobody does content management better than ANS.','','Revolutionary CMS Platform','CMS Platform',2),(254,260,'<p>Proof reading services are offered for a great variety of written works. Have your spelling, grammar, and syntax reviewed for a polished finished product. Prices will vary depending on the length of the text being revised. </p>','Proof Reading','Essays, manuscripts, articles and more!','Proof Reading',0),(254,261,'<p>A brief description of the product will be required and if desired a tagline can also be used. Reviews will always be showing the product in a positive light and as sincere as possible. The length of the review will depend upon the preference of the customer. </p>','Written Reviews','Product review services','Written Reviews',0),(243,262,'Stuff here','','Social media','Social media',0);
/*!40000 ALTER TABLE `content_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `county`
--

DROP TABLE IF EXISTS `county`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `county` (
  `county_id` int(10) unsigned NOT NULL auto_increment,
  `county_name` text NOT NULL,
  PRIMARY KEY  (`county_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `county`
--

LOCK TABLES `county` WRITE;
/*!40000 ALTER TABLE `county` DISABLE KEYS */;
INSERT INTO `county` VALUES (15,'San Diego');
/*!40000 ALTER TABLE `county` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customerId` int(10) unsigned NOT NULL auto_increment,
  `customerType` set('R','C') NOT NULL,
  PRIMARY KEY  (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `default_styles`
--

DROP TABLE IF EXISTS `default_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `default_styles` (
  `default_index` int(11) NOT NULL auto_increment,
  `sheet` text NOT NULL,
  PRIMARY KEY  (`default_index`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `default_styles`
--

LOCK TABLES `default_styles` WRITE;
/*!40000 ALTER TABLE `default_styles` DISABLE KEYS */;
INSERT INTO `default_styles` VALUES (1,'page_layout.css');
/*!40000 ALTER TABLE `default_styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_qa`
--

DROP TABLE IF EXISTS `faq_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_qa` (
  `qa_id` int(10) unsigned NOT NULL auto_increment,
  `faq_id` int(10) unsigned NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `order` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`qa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_qa`
--

LOCK TABLES `faq_qa` WRITE;
/*!40000 ALTER TABLE `faq_qa` DISABLE KEYS */;
INSERT INTO `faq_qa` VALUES (1,1,'Does Artistic Net Solutions do wordpress site development?','Yes here at Artistic Net Solutions we are familiar with most CMS platforms and can offer development on wordpress as well as many other. Altho we do suggest in most situations that you go with our in house platform.',1),(3,1,'Do you offer payment plans or financing?','In some situations yes we do offer financing but there are several prerequisits that must be met in order for us to provide that service.',3),(4,1,'Does Artistic Net Solutions offer a consultaton service to look over my current site or a proposal?','Yes we are more than happy to look over your current web presence or a propsal from another provider and give you information. We do not have a flat rate for this so I would suggest you getting in contact with someone at our office. We will be more than happy to help.',2);
/*!40000 ALTER TABLE `faq_qa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `faq_id` int(10) unsigned NOT NULL auto_increment,
  `faq_name` text NOT NULL,
  PRIMARY KEY  (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'Artistic Net Solutions FAQ'),(2,'SimpleCMS FAQ'),(3,'WordPress FAQ');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_elements`
--

DROP TABLE IF EXISTS `form_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_elements` (
  `form_id` int(10) unsigned NOT NULL,
  `element_id` int(10) unsigned NOT NULL auto_increment,
  `element_type` set('I','T','S') NOT NULL,
  `element_label` text NOT NULL,
  `element_value` varchar(200) NOT NULL,
  `element_height` varchar(45) NOT NULL,
  `element_width` varchar(45) NOT NULL,
  `element_return_email` set('Y','N') NOT NULL,
  `order` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`element_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_elements`
--

LOCK TABLES `form_elements` WRITE;
/*!40000 ALTER TABLE `form_elements` DISABLE KEYS */;
INSERT INTO `form_elements` VALUES (1,1,'I','First Name','','0','200','N',0),(1,2,'I','Last Name','','0','200','N',0),(1,3,'I','Email Address','','0','250','Y',0),(1,4,'I','Phone Number','','0','250','N',0),(1,5,'S','Reason for Contacting?','Billing,Support,Potential Project,Quote,Complaint','0','0','N',0),(1,9,'T','Message','','100','350','N',0),(2,10,'I','Company Name:','','0','200','N',1),(2,11,'I','Contact Phone:','','0','200','N',2),(2,12,'I','Contact Name:','','0','200','N',3),(2,13,'S','Service Type: ','New Website (Custom),New Website (WordPress),Website Redesign,Logo Design,Print Design,Illustration,CRM Solutions','0','0','N',4),(2,14,'S','Project Category:','eCommerce,Small Business,Personal Website,Non-Profit Organization,Start-Up,Marketing Materials (Web),Marketing Materials (Print),CRM,Other','0','0','N',5),(2,15,'T','If you selected \"Other\", please explain:','','80','200','N',6),(2,16,'S','Delivery Time Frame:','1-6 Days (Graphic Design Only),1-3 Weeks,1-2 Months,3-5 Months,6+ Months','0','0','N',7),(2,17,'T','Please explain a bit about your company:','','80','200','N',8),(2,18,'T','How will this project help your company?','','80','200','N',9),(2,19,'S','Do you want us to host your website?','Yes,No,Not Sure','0','0','N',10),(2,20,'T','Who is your target audience?','','80','200','N',11),(2,21,'S','What is your budget range?','$100-$1000 (Graphic Design Only),$1000-$3000 (WordPress Websites Only),$3000+ (Custom)','0','0','N',12),(2,22,'I','What is your domain name? (e.g. www.mydomain.com)','','0','200','N',13),(2,23,'I','Contact Email Address: ','','0','200','Y',14),(2,24,'T','Please list some websites that are similar in function or design to your project:','','80','200','N',15),(2,25,'S','Who will be managing your content?','Artistic Net Solutions,Myself,Someone Else','0','0','N',16),(2,26,'S','How often will your site content be updated?','Daily,Weekly,Monthly,Bi-Monthly,Every 6 Months,Yearly,Never','0','0','N',17),(2,27,'T','Please list the types of pages you want to appear on the site: (e.g. Contact, Products, etc.))','','80','200','N',18),(2,28,'T','Please describe the style and aesthetic you are going for with this project:','','80','200','N',19),(2,29,'S','Do you have a specific color scheme in mind?','Yes,No,Not Sure','0','0','N',20),(2,30,'T','If you selected \"Yes\", please provide the requested color scheme:','','80','200','N',21),(2,31,'S','Do you have an official style guide?','Yes,No,Not Sure','0','0','N',22),(2,32,'T','Special instructions or final comments for ANS:','','80','250','N',23);
/*!40000 ALTER TABLE `form_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `form_id` int(10) unsigned NOT NULL auto_increment,
  `form_name` varchar(150) NOT NULL,
  `form_recipiant` varchar(100) NOT NULL,
  `form_subject` varchar(45) NOT NULL,
  `form_message` text NOT NULL,
  `send_confirmation` set('Y','N') NOT NULL,
  `confirmation_subject` varchar(150) NOT NULL,
  `confirmation_message` text NOT NULL,
  `confirmation_link_input` set('Y','N') NOT NULL,
  `thank_you_title` varchar(150) NOT NULL,
  `thank_you_message` text NOT NULL,
  `thank_you_link_input` set('Y','N') NOT NULL,
  PRIMARY KEY  (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (1,'Contact Us Form','rosamond.corey@gmail.com','A message was submited on the ANS Contact Us ','Bellow is the content submitted on the ANS Contact Us Form.','Y','Thank you for contacting Artistic Net Solutions','Thank you for contacting Artistic Net Solutions we will get back to you with in 48 business hours. Bellow is a copy of the information you submitted to us.','Y','Thank you for taking the time to contact us','Here is a copy of the information you submitted to us. Feel free to print it for your records.','Y'),(2,'Website Project Questionnaire','rosamond.corey@gmail.com','Website Project Form Submission on ANS','A potential client has filled out the website project questionnaire. The information they submitted is as follows:','Y','Thank you for filling out our web project questionnaire!','Thank you for contacting Artistic Net Solutions regarding a possible web project. We are reviewing your answers to the questionnaire, and the information you submitted to us is as follows:','Y','Thank you for filling out the questionnaire!','We will review your project and contact you in a timely manner by the contact information you submitted. Below is a copy of the information you submitted to us for your records. We have also sent you a confirmation email with the same information.','Y');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_images`
--

DROP TABLE IF EXISTS `header_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header_images` (
  `header_id` int(10) unsigned NOT NULL auto_increment,
  `header_name` varchar(150) NOT NULL,
  `img_src` varchar(150) NOT NULL,
  `svc_own` int(11) NOT NULL,
  PRIMARY KEY  (`header_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_images`
--

LOCK TABLES `header_images` WRITE;
/*!40000 ALTER TABLE `header_images` DISABLE KEYS */;
INSERT INTO `header_images` VALUES (47,'Services','services-head.png',8),(48,'About Us','about-head.png',8),(49,'Contact Us','contact-head.png',8),(50,'FAQ','faqs-head.png',8),(51,'Portfolio','portfolio-head.png',8),(52,'Login','login-head.png',8),(53,'Submit a Project','project-head.png',8);
/*!40000 ALTER TABLE `header_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hero_sliders`
--

DROP TABLE IF EXISTS `hero_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hero_sliders` (
  `slider_id` int(10) unsigned NOT NULL auto_increment,
  `slider_name` varchar(75) NOT NULL,
  `slider_height` int(10) unsigned NOT NULL,
  `slider_width` int(10) unsigned NOT NULL,
  `site_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_sliders`
--

LOCK TABLES `hero_sliders` WRITE;
/*!40000 ALTER TABLE `hero_sliders` DISABLE KEYS */;
INSERT INTO `hero_sliders` VALUES (1,'Home Page Slider',264,978,1),(2,'New slider',800,600,1);
/*!40000 ALTER TABLE `hero_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `htacces_entrys`
--

DROP TABLE IF EXISTS `htacces_entrys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htacces_entrys` (
  `access_entry` int(11) NOT NULL auto_increment COMMENT 'Global access id',
  `first` text NOT NULL COMMENT 'the actual entry',
  `second` varchar(100) NOT NULL,
  `generated` set('H','F','C') NOT NULL,
  `root` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`access_entry`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `htacces_entrys`
--

LOCK TABLES `htacces_entrys` WRITE;
/*!40000 ALTER TABLE `htacces_entrys` DISABLE KEYS */;
/*!40000 ALTER TABLE `htacces_entrys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `module_id` int(11) NOT NULL auto_increment,
  `module_name` text NOT NULL,
  `module_dir` text NOT NULL,
  `global_module_id` int(11) NOT NULL,
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'Site Text Manager','administration_text_settings/',1),(2,'CMS Administration','cms_administration/',2),(3,'Navigation Builder','cms_navigation_builder/',3),(4,'Content Editor','cms_content_editor/',4),(5,'Content Page','cms_content_page/',5),(6,'Contact Us','cms_contact_us/',6),(7,'Header System','cms_header_controle/',7),(8,'Site Map Page','cms_site_map/',8),(9,'Search Results','cms_search_results/',9),(10,'Multi Site','cms_multi_site/',10),(11,'System Manager','cms_system_manager/',11),(12,'Administration Navigation','cms_administration_navigation/',12),(13,'Company Resource Manager','cms_company_resource_manger/',13),(14,'Theme','cms_theme/',14),(15,'Site Network','cms_network_view/',15),(16,'Oops Page','cms_oops_page/',16),(17,'Site Builder','cms_site_builder/',17),(18,'Portfolio','cms_portfolio/',18),(19,'Frequently Asked Questions','cms_frequently_asked_questions/',19),(20,'Forms','cms_forms/',20);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navigation`
--

DROP TABLE IF EXISTS `navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navigation` (
  `button_id` int(10) unsigned NOT NULL auto_increment,
  `display_text` varchar(75) NOT NULL,
  `link_format` set('P','H','F') NOT NULL,
  `page_id` int(10) unsigned NOT NULL,
  `display_order` int(10) unsigned NOT NULL,
  `http_type` set('S','D') NOT NULL,
  `access_id` int(10) unsigned NOT NULL default '0',
  `navigation` set('H','F') NOT NULL,
  `button_class` int(10) unsigned NOT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY  (`button_id`)
) ENGINE=MyISAM AUTO_INCREMENT=536 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navigation`
--

LOCK TABLES `navigation` WRITE;
/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` VALUES (526,'ABOUT','P',244,4,'D',0,'H',2,1),(525,'SERVICES','P',243,3,'D',0,'H',1,1),(524,'PORTFOLIO','P',242,2,'D',0,'H',1,1),(523,'HOME','P',240,1,'D',0,'H',1,1),(527,'CONTACT','P',245,5,'D',0,'H',2,1),(528,'FAQS','P',246,6,'D',0,'H',2,1),(529,'LOGIN','P',247,7,'D',0,'H',3,1),(530,'Blog','P',241,8,'D',0,'F',0,1),(531,'CMS Features','P',241,9,'D',0,'F',0,1),(532,'Site Map','P',241,10,'D',0,'F',0,1),(533,'Privacy','P',241,11,'D',0,'F',0,1),(534,'Terms','P',241,12,'D',0,'F',0,1),(535,'Other Services','P',254,13,'D',0,'F',0,1);
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_meta`
--

DROP TABLE IF EXISTS `page_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_meta` (
  `page_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `nofollow` set('N','Y') NOT NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_meta`
--

LOCK TABLES `page_meta` WRITE;
/*!40000 ALTER TABLE `page_meta` DISABLE KEYS */;
INSERT INTO `page_meta` VALUES (240,'Artistic Net Solutions','Temporary Keywords','Temporary Description','N'),(241,'Coming Soon!!!!!','','','N'),(242,'Check our our portfolio','','','N'),(243,'Our Services','','','N'),(244,'About Artistic Net Solutions','','','N'),(245,'Contact Artistic Net Solutions','','','N'),(246,'Frequently Asked Questions','','','N'),(247,'Client Portal','','','N'),(248,'Blog','','','N'),(249,'CMS Features','','','N'),(250,'Site Map','','','N'),(251,'Privacy','','','N'),(252,'Terms','','','N'),(253,'Submit a Project','','','N'),(254,'Other Services','proof reading, editing, reviews, writing, essay help, grammer, research, writing','This is a page of services offered by Nicole Pham','N');
/*!40000 ALTER TABLE `page_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_module`
--

DROP TABLE IF EXISTS `page_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_module` (
  `page_module_id` int(10) unsigned NOT NULL auto_increment,
  `page_module_name` varchar(150) NOT NULL,
  `module_id` int(10) unsigned NOT NULL,
  `component_id` int(10) unsigned NOT NULL,
  `page_module_sheet_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`page_module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_module`
--

LOCK TABLES `page_module` WRITE;
/*!40000 ALTER TABLE `page_module` DISABLE KEYS */;
INSERT INTO `page_module` VALUES (1,'Content Page',5,1,2),(2,'Contact Us',6,1,4),(3,'Site Map',8,1,5),(4,'Network Page',15,1,6),(5,'Oops Page',16,1,7),(6,'Frequently Asked Questions',19,2,0),(7,'Portfolio',18,2,0),(8,'Form',20,2,0);
/*!40000 ALTER TABLE `page_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL auto_increment COMMENT 'Index of the page',
  `template_id` int(11) NOT NULL COMMENT 'Index of the template this page uses',
  `page_type` int(11) NOT NULL,
  `cms_page_name` varchar(150) NOT NULL,
  `header_image` varchar(150) NOT NULL,
  `page_scope` set('N','P','H','F','A','S','Q','T','O') default NULL,
  `site_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `isindex` set('Y','N') NOT NULL,
  `header_type` set('S','I','N') NOT NULL,
  `page_header` int(10) unsigned NOT NULL,
  `content_type` set('T','L') NOT NULL,
  `content_position` set('B','A','N') NOT NULL,
  `module_sub_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (240,3,1,'Index Page','1','N',1,8,'Y','S',1,'T','B',0),(241,6,1,'Coming Soon','48','N',1,8,'N','I',2,'L','B',0),(242,8,7,'Portfolio Page','51','N',1,8,'N','I',2,'L','N',1),(243,6,1,'Services Page','47','N',1,8,'N','I',2,'L','B',0),(244,6,1,'About Us Page','48','N',1,8,'N','I',2,'L','B',0),(245,6,8,'Contact Us Page','49','N',1,8,'N','I',2,'L','B',1),(246,6,6,'FAQ Page','50','N',1,8,'N','I',2,'L','B',1),(247,6,1,'Login Page','52','N',1,8,'N','I',2,'L','B',0),(248,6,1,'Blog Page','47','N',1,8,'N','I',2,'L','B',0),(249,6,1,'CMS Features Page','47','N',1,8,'N','I',2,'L','B',0),(250,6,1,'Site Map Page','47','N',1,8,'N','I',2,'L','B',0),(251,6,1,'Privacy Page','47','N',1,8,'N','I',2,'L','B',0),(252,6,1,'Terms Page','47','N',1,8,'N','I',2,'L','B',0),(253,6,8,'Submit a Project','53','N',1,8,'N','I',2,'L','B',2),(254,6,1,'Other Services: Nicole','47','N',1,8,'N','I',2,'L','B',0);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pest`
--

DROP TABLE IF EXISTS `pest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pest` (
  `pest_id` int(10) unsigned NOT NULL auto_increment,
  `pest_name` text NOT NULL,
  PRIMARY KEY  (`pest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pest`
--

LOCK TABLES `pest` WRITE;
/*!40000 ALTER TABLE `pest` DISABLE KEYS */;
/*!40000 ALTER TABLE `pest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone` (
  `phone_id` int(10) unsigned NOT NULL auto_increment,
  `phone_name` text NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  PRIMARY KEY  (`phone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
INSERT INTO `phone` VALUES (1,'Cell Number','(760) 699-3636');
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `portfolio_id` int(10) unsigned NOT NULL auto_increment,
  `portfolio_name` text NOT NULL,
  PRIMARY KEY  (`portfolio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,'ANS Default Portfolio');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_categorys`
--

DROP TABLE IF EXISTS `portfolio_categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio_categorys` (
  `category_id` int(10) unsigned NOT NULL auto_increment,
  `portfolio_id` int(10) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `category_name` text NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_categorys`
--

LOCK TABLES `portfolio_categorys` WRITE;
/*!40000 ALTER TABLE `portfolio_categorys` DISABLE KEYS */;
INSERT INTO `portfolio_categorys` VALUES (1,1,1,'Web Development'),(2,1,4,'Corporate Re-Branding'),(3,1,2,'Logo Design'),(4,1,3,'Print Media'),(5,1,5,'Other');
/*!40000 ALTER TABLE `portfolio_categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_elements`
--

DROP TABLE IF EXISTS `portfolio_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio_elements` (
  `element_id` int(10) unsigned NOT NULL auto_increment,
  `portfolio_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `description` text NOT NULL,
  `date` varchar(75) NOT NULL,
  `link_text` varchar(150) NOT NULL,
  `link_location` varchar(150) NOT NULL,
  `image_name` varchar(150) NOT NULL,
  `order` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`element_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_elements`
--

LOCK TABLES `portfolio_elements` WRITE;
/*!40000 ALTER TABLE `portfolio_elements` DISABLE KEYS */;
INSERT INTO `portfolio_elements` VALUES (7,1,1,'Dria Cover','Maternity Breast Feeding Covers','Dria Cover sells premium maternity breast feeding covers. We were in charge of coding the front end and setting up the back end platform using our proprietary CMS.','November 2010','Visit Dria Cover Â»','http://www.driacover.com/','7dria-screen_01.png',1),(8,1,1,'Brainard\'s Natural Remedies','Need a more natural remedy?','Brainard\'s specializes in providing a more natural solution to health needs. We created the site on our custom CMS platform.','December 2009','Visit Brainard\'s Â»','http://www.brainardsnaturalremedies.com/','8brainard-screen_01.png',7),(12,1,1,'Connect a Job','The Video Resume Revolution','Connect a Job seeks to change how job seekers and employers connect. ANS is responsible for the front end design and HTML/CSS of Connect a Job.','October 2011','Visit Connect a Job Â»','http://www.connectajob.com','12caj-screen_01.png',0),(13,1,2,'Evil Iguana Productions','We Make Movies','Evil Iguana Productions wanted to refresh their image and focus their website on the videos they produce on their popular YouTube channel.','N/A','','','13eip-screen_02.png',0),(14,1,1,'Connect a Job','Corporate Logo Design','The Connect a Job logo combined elements from previous iterations and created a mark that could be used for its video resume focus and colorful, corporate design.','October 2011','Visit Connect a Job Â»','http://www.connectajob.com','14caj-logo_01.png',0),(15,1,1,'Star Paper','Wholesale Paper Distributor','Star Paper came wanted a very basic online store to allow ordering online from their warehouse. Uses Mals-Ecommerce shopping cart system.','May 2008','Visit Star Paper Store Â»','http://www.starpaperstore.com','15star-paper-screen_01.png',9),(16,1,1,'Grouped-Up','Daily Deal Aggregator','Grouped-Up wanted a custom WordPress theme that was easy to use and tailored to a specific demographic for their daily deal dissemination.','May 2010','Visit Grouped-Up &raquo;','http://www.grouped-up.com','16grouped-up-screen_01.png',3),(17,1,1,'Pro Pacific Pest Control','Pest Control Services','We created a custom WordPress theme for Pro Pacific\'s website redesign, keeping a clean, corporate design and strong back-end features.','April 2010','','','17pro-pest-screen_01.png',4),(18,1,3,'Chocolate Citizens','Charity Organization','Chocolate Citizens wanted a logo that echoed the elegance of Tiffany & Co. while retaining the friendliness of the family tree.','June 2009','Visit Chocolate Citizens &raquo;','http://www.chocolatecitizens.com','18cz-logo_01.png',3),(19,1,3,'Owen West','Unused Logo Concept','Unused personal logo design for Owen West.','June 2010','','','19ow-logo_01.png',1),(20,1,3,'Awaken','Unused Logo Concept','Unused logo design for Awaken.','March 2010','','','20awaken-logo_01.png',2),(21,1,1,'Pro Pacific Bee Removal','Bee Removal Services','Pro Pacific Bee Removal\'s redesign retained the modern feel of its Flash banner from the previous version. The new site is a custom WordPress theme.','April 2010','','','21pro-bee-screen_01.png',5),(22,1,3,'SHDD','Personal Logo Design','Personal logo design for Scott Hernandez Digital Design.','June 2008','Visit SHDD &raquo;','http://www.scottahernandez.com','22shdd-logo_01.png',4),(23,1,1,'Pest Network','Custom WordPress Theme','Custom WordPress development, web design and character illustration for pest control network of local websites.','June 2010','','','23pest-network-screen_01.png',2),(24,1,1,'US Window & Door','Custom Window Framing','This design mock up was used to establish the clean, corporate feel of the final website. While no used in its entirety in the final design, this mock up set the course for the brand strategy.','December 2009','Visit US Window & Door Â»','http://www.uswindow-door.com/','24us-window-screen_01.png',6),(25,1,1,'Guahan Grill','Traditional Island Flavors Restaurant','Custom design mock up and Flash development for Guahan Grill. The restaurant wanted to keep a relaxed mood that reflected a smooth sunset of soft browns and yellows.','February 2009','Visit Guahan Grill &raquo;','http://www.guahangrill.com','25guahan-screen_01.png',8),(26,1,5,'Pest Illustrations','Window Lettering Illustrations','Panoramic illustration stretching across 14 windows. Illustration done entirely with vectors and can scale indefinitely.','January 2011','','','26pest-illust_01.png',0);
/*!40000 ALTER TABLE `portfolio_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `service_id` int(11) NOT NULL auto_increment,
  `service_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (8,'Web Development');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `site_id` int(10) unsigned NOT NULL auto_increment,
  `site_name` varchar(100) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `county_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `phone_id` int(10) unsigned NOT NULL,
  `address_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `gmapapi` varchar(200) NOT NULL,
  PRIMARY KEY  (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (1,'Artistic Net Solution','www.artisticnetsolutions.com',15,1,1,40,8,1,'');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_headers`
--

DROP TABLE IF EXISTS `site_headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_headers` (
  `header_id` int(10) unsigned NOT NULL auto_increment,
  `header_type` set('G','S') NOT NULL,
  `site_id` varchar(45) NOT NULL,
  `header_name` varchar(100) NOT NULL,
  `header_file` varchar(100) NOT NULL,
  PRIMARY KEY  (`header_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_headers`
--

LOCK TABLES `site_headers` WRITE;
/*!40000 ALTER TABLE `site_headers` DISABLE KEYS */;
INSERT INTO `site_headers` VALUES (1,'S','1','Home Page','1.inc.php'),(2,'S','1','Content Page Header','2.inc.php'),(3,'S','1','Content Page Header','3.inc.php');
/*!40000 ALTER TABLE `site_headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_frames`
--

DROP TABLE IF EXISTS `slider_frames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider_frames` (
  `slider_id` int(10) unsigned NOT NULL,
  `frame_id` int(10) unsigned NOT NULL auto_increment,
  `frame_image` varchar(100) NOT NULL,
  `frame_text` text NOT NULL,
  `frame_page_link` int(10) unsigned NOT NULL,
  `frame_order` int(10) unsigned NOT NULL,
  `frame_header` varchar(100) NOT NULL,
  PRIMARY KEY  (`frame_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_frames`
--

LOCK TABLES `slider_frames` WRITE;
/*!40000 ALTER TABLE `slider_frames` DISABLE KEYS */;
INSERT INTO `slider_frames` VALUES (1,8,'stable-secure_hero.png','Artistic Net Solutions will ensure your website or application is tightly secured and ready for public consumption. Find out what makes us different and how you can protect your online identity with the most powerful system on the net. Visit the services page to see what else we offer.',243,1,'Stability & Security'),(2,9,'','name',240,2,'title'),(2,10,'','second frame',240,1,'frame 2');
/*!40000 ALTER TABLE `slider_frames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style` (
  `style_index` int(11) NOT NULL auto_increment,
  `element` text NOT NULL,
  `class` text NOT NULL,
  `state` text NOT NULL,
  `property` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`style_index`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style`
--

LOCK TABLES `style` WRITE;
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
INSERT INTO `style` VALUES (1,'body','NULL','NULL','font-family','Times New Roman, Times, serif'),(2,'body','NULL','NULL','font-size','11px'),(3,'body','NULL','NULL','font-weight','normal'),(4,'body','NULL','NULL','text-decoration','none'),(5,'body','NULL','NULL','font-style','italic'),(6,'body','NULL','NULL','color','#FF432E');
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style_sheet`
--

DROP TABLE IF EXISTS `style_sheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style_sheet` (
  `sheet_index` int(10) unsigned NOT NULL auto_increment,
  `sheet_id` int(10) unsigned NOT NULL,
  `sheet_dir` varchar(150) NOT NULL,
  `sheet_name` varchar(150) NOT NULL,
  PRIMARY KEY  (`sheet_index`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style_sheet`
--

LOCK TABLES `style_sheet` WRITE;
/*!40000 ALTER TABLE `style_sheet` DISABLE KEYS */;
INSERT INTO `style_sheet` VALUES (3,0,'css/front/','header_navigation.css'),(4,0,'css/front/','footer_navigation.css'),(5,0,'css/front/','base_styles.css'),(6,1,'css/front/','home_page.css'),(9,4,'modules/cms_contact_us/css/','contact_us.css'),(10,5,'modules/cms_site_map/css/','site_map.css'),(11,6,'modules/cms_search_results/css/','search_results.css'),(12,2,'css/front/','content_page.css'),(13,0,'css/front/','header.css'),(14,0,'css/front/','footer.css');
/*!40000 ALTER TABLE `style_sheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `template_id` int(11) NOT NULL auto_increment COMMENT 'Global template id ',
  `file_name` text NOT NULL COMMENT 'name of the template file',
  `template_name` varchar(150) NOT NULL,
  `template_sheet_id` int(10) unsigned NOT NULL,
  `theme_id` int(11) NOT NULL,
  `template_type` set('I','C') NOT NULL,
  PRIMARY KEY  (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (6,'content.inc.php','Content Page',2,1,'C'),(8,'portfolio.inc.php','Portfolio Page',2,1,'C'),(3,'index.inc.php','Home Page',1,1,'I');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates_tokens`
--

DROP TABLE IF EXISTS `templates_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates_tokens` (
  `template_id` int(11) NOT NULL COMMENT 'ID of the template this belongs too',
  `token` text NOT NULL COMMENT 'the token itself',
  `token_value` text NOT NULL COMMENT 'the value of the token',
  `token_type` int(11) NOT NULL,
  `order_index` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`order_index`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates_tokens`
--

LOCK TABLES `templates_tokens` WRITE;
/*!40000 ALTER TABLE `templates_tokens` DISABLE KEYS */;
INSERT INTO `templates_tokens` VALUES (0,'%%SITE_HEADER%%','site_header.php',6,1),(0,'%%SITE_FOOTER%%','site_footer.inc.php',4,2),(0,'%%HEADER_NAVIGATION%%','header_navigation.inc.php',4,3),(0,'%%FOOTER_NAVIGATION%%','footer_navigation.inc.php',4,4),(0,'%%TWITTER_FEED%%','twitter_feed.php',4,5),(0,'%%HERO%%','hero.php',4,6),(0,'%%CONTENT%%','content_build.php',4,32),(0,'%%SUB_HEADER%%','sub_header',1,31),(0,'%%HEADER%%','header',1,30),(0,'%%PAGE_CONTENT%%','page Content',2,26),(0,'%%HEADER_IMAGE%%','header_image.inc.php',4,24);
/*!40000 ALTER TABLE `templates_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme` (
  `theme_id` int(11) NOT NULL auto_increment,
  `theme_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`theme_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (1,'Artistic Net Solutions Main Theme');
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_to_permission`
--

DROP TABLE IF EXISTS `user_to_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_to_permission` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_to_permission`
--

LOCK TABLES `user_to_permission` WRITE;
/*!40000 ALTER TABLE `user_to_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_to_permission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-28 14:29:57
