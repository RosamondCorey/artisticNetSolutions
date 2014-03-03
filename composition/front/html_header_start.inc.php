<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
      <title><?php echo $architect->SiteData['title']; ?></title>
      	<?php if($architect->SiteData['nofollow']=='Y'){ echo '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">'; } ?>
      	<meta name="keywords" content="<?php echo $architect->SiteData['keywords']; ?>">
		<meta name="description" content="<?php echo $architect->SiteData['description']; ?>">
        <link REL="SHORTCUT ICON" HREF="favicon.gif"> 
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
       	<script src="http://<?php echo $architect->hostData['site_url']; ?>/include/twitter.js"></script>
 		<script type="text/javascript" language="Javascript">
      		JSRL = "<?php echo $architect->SiteData['URL']; ?>";
    	</script>
        <?php if($architect->SiteData['header_type']=='S'){ ?>
				<script src="http://<?php echo $architect->hostData['site_url']; ?>/javascript/common/hero_slider.js"></script>
		<?php } ?>
		<script src="http://<?php echo $architect->hostData['site_url']; ?>/javascript/common/content_area.js"></script>