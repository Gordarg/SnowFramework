<?php 
include_once 'core/config.php';
use core\config;
include ('core/init.php');
require_once 'semi-orm/Categories.php';
use orm\Categories;
$parent = realpath(dirname(__FILE__) . '/..');
?>
<!DOCTYPE html>

<!--
	GORDCMS by
	Gordarg
	
                                                                          `:+shdmNMMMNmdyo/.        
                                                                       .:/o+/:.`    .-+smMMMNy/     
                                                                    -+sdmMMMMMMMNds/`    .oNMMMNo`  
                                                                .+hNMMMMMMMMMMMMMMMMNs`    `hMMMMN: 
                                                             .omMMMMMMMNho/-.```.:+yNMN.    `mMMMMM:
                                                           -yMMMMMMMms-              :dm     yMMMMMd
                                                         -hMMMMMMMy:                 -./.   `NMMMMMM
                                                       .hMMMMMMNs.             -oh-  oNo.`-+NMMMMMMm
                                                     `oMMMMMMMs`            .sNMMMN- +MMMMMMMMMMMMM/
                                                    :mMMMMMMy.             sMMMMMMMm``dMMMMMMMMMMM+ 
                                                  `yMMMMMMm:              sMMMMMMMMMy  /hMMMMMMmo.  
           .o:                                   /NMMMMMMo                NMMMMMMMMMM-    -::-`     
          oMMMNs.                              `yMMMMMMm-                 dMMMMMMMMMMy              
        .dMMMMMMMs                            :mMMMMMMs                   -MMMMMMMMMMN              
       .NMMMMMMMMMh                          sMMMMMMN:                     /MMMMMMMMMM`             
       yMMMMMMMMMMMo                       .mMMMMMMh`                       /MMMMMMMMM              
       sMMMMMMMMMMMd                      +MMMMMMN/                   :odM.  /MMMMMMMh              
       `dMMMMMMMMMMd                    -dMMMMMMy`                 :yNMMMM.   hMMMMMM-              
         oMMMMMMMMM+                  .yMMMMMMd-                -sNMMMMMMM:  .mMMMMM+               
          .dMMMMMMh                 -hMMMMMMm/               .omMMMh+-yMMMMmmMMMMMN/                
            mMMMMh`              `+dMMMMMMd:              `/hMMMm+`   +MMMMMMMMMNs`                 
           `NMMN/             .+hMMMMMMNs.             `/hMMMMy-       +hmMMNmy/`                   
          :mMd+          `-+ymMMMMMMdo-             .+hMMMMNo`                                      
       -omdo. .::::/+oyhmMMMMMNdy+-`            `:smMMMMMd/                                         
   -oyyo:-:ohho+/:/+oooo++/:.`             `-+ymMMMMMMmo.                                           
 /soooydNMMMMMMMMMmdyo+/:-.``    ``.-:/oyhmMMMMMMMMdo-                                              
 `/ymMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMds/`                                                 
     `-+shmMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMNdy+-`                                                     
            .:/osyhdmNNMMMMMMMNNmdhys+/-`                                                           
-->

<html>
<head>
<title><?php echo config::TITLE ?></title>
<<<<<<< HEAD
=======
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="keywords" content="<?php echo config::META_KEYWORDS ?>" />
<meta name="description" content="<?php echo config::META_DESCRIPTION ?>" />
<meta name="language" content="<?php echo config::LANGUAGE ?>" />
<meta name="geo.region" CONTENT="<?php echo config::REGION ?>" />
<meta name="googlebot" content="INDEX, follow" />
<meta name="robots" content="index, follow"/>
<meta charset="utf-8">
<!-- needs attention -->
	<!-- <meta name="author" content="<-BlogAuthor->"> -->
<meta itemprop="name" content="<?php echo config::META_DESCRIPTION ?>">
	<!-- <meta itemprop="description" content="خلاصه در این جا قرار می گیرد""> -->
	<!-- <meta property="fb:admins" content="100001867037114"> -->
	<!-- <meta property="og:title" content="GORDCMS"> -->
	<!-- <meta property="og:description" content="Gordarg Content Management System"> -->
	<!-- <meta property="og:image" content="logo.png"> -->
	<!-- <meta property="og:url" content="[FAST READ URL FOR THIS CONTENT]">	 -->
<meta name="revised" content="Tutorialspoint, 3/7/2014" />
<meta name="viewport" content="width=device-width, initial-scale=1">
>>>>>>> db28529692b5a2c0580814618e4f03b0d7b76344
<?php
$_GET['yeild'] =  basename($_SERVER["SCRIPT_FILENAME"], ".php");
include_once $parent . '/meta/render.php';
$items =  explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",str_replace("://", "/", str_replace("?", "/", $path))));
for ($i=2; $i < count($items); $i++ )
{
	echo '<link href="' . $npath . '/css';
	for ($j=3; $j <= $i; $j++ )
		echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
	echo '.css" rel="stylesheet" />';
	echo '
';
}
?>
</head>
<body>
	<nav
		class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-right"
		style="display: none; z-index: 2; width: 40%; min-width: 300px"
		id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">☰</a> <a href="./" onclick="w3_close()" class="w3-bar-item w3-button">خانه</a>
		<a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button">ثبت نام</a>
		<a href="admin.php?type=POST" onclick="w3_close()" class="w3-bar-item w3-button">ورود</a>
		<a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button">تنظیمات</a>
		<a href="search.php" onclick="w3_close()" class="w3-bar-item w3-button">جستوجو</a>
		<a href="category.php" onclick="w3_close()" class="w3-bar-item w3-button">مدیریت دسته ها </a>
		<a href="login.php?way=bye" onclick="w3_close()" class="w3-bar-item w3-button">خروج</a>
		<hr />
		<?php
		foreach ((new Categories($conn))->ToList(0, 48, "Name", "DESC", "") as $category_row)
			echo '<a rel="nofollow" href="archive.php?CategoryID=' . $category_row["Id"] . '" onclick="w3_close()" class="w3-bar-item w3-button">' . $category_row["Name"] . '</a>';
        ?>
	</nav>

	<header class="w3-top" role="banner">
		<div class="w3-white w3-xlarge"
			style="max-width: 1200px; margin: auto">
			<div class="w3-button w3-padding-16 w3-right" onclick="w3_open()">☰</div>
			<div class="w3-center w3-padding-16"><?php echo config::NAME ?></div>
		</div>
	</header>

	<div class="w3-main w3-content w3-padding"
		style="max-width: 1200px; margin-top: 100px">
		<div class="w3-container w3-padding-32 w3-center">
			<img class="w3-left w3-padding-small rexa-social"
				title="به صفحه ی ما در فیسبوک بپیوندید" alt="facebook"
				src="icons/facebook.svg" /> <img
				class="w3-left w3-padding-small rexa-social"
				title="ما را به حلقه های خود در گوگل پلاس اضافه کنید"
				alt="google plus" src="icons/google.svg" /> <img
				class="w3-left w3-padding-small rexa-social"
				title="تماشاچی کانال ما در یوتوب باشید" alt="youtube"
				src="icons/youtube.svg" /> <img
				class="w3-left w3-padding-small rexa-social"
				title="اینستاگرام ما را دنبال کنید" alt="instagram"
				src="icons/instagram.svg" /> <a href="archive.php"> <img
				class="w3-left w3-padding-small rexa-social"
				title="ارشیو ما را دنبال کنید" alt="archive"
				src="icons/library.png" /></a>
		</div>