<!DOCTYPE html>
<head>
	<meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />  
	<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->

	<title><?= $title ?></title>
	
	<link href="<?= BASE_URL.'/../../public/skins/'.SKIN.'/img/icons/empire-icon-16.png' ?>" rel="icon" type="image/png"  />

    <link href="<?= BASE_URL.'/../../public/skins/'.SKIN.'/css/bootstrap.min.css' ?>" media="screen" rel="stylesheet" type="text/css" /> 
    <link href="<?= BASE_URL.'/../../public/skins/'.SKIN.'/css/layout.css' ?>" media="screen" rel="stylesheet" type="text/css" />
	
    <script type="text/javascript" src="<?= BASE_URL.'/../../public/skins/'.SKIN.'/js/jquery.min.js' ?>"></script> 
    <script type="text/javascript" src="<?= BASE_URL.'/../../public/skins/'.SKIN.'/js/bootstrap.min.js' ?>"></script> 
    
</head>
<body>
	<div class="navbar-wrapper">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</button>
		</div>

		<div class="navbar" id="bs-example-navbar-collapse-1">
			<ul>
				<li><a href="<?= BASE_URL.'/' ?>">&lt;/&gt;</a></li>	
				<li><a href="<?= BASE_URL.'/news' ?>">News</a></li>
				<li><a href="<?= BASE_URL.'/bio' ?>">Bio</a></li>
				<li><a href="<?= BASE_URL.'/games' ?>">Games</a></li>
				<li><a href="<?= BASE_URL.'/contacts' ?>">Contacts</a></li>
				<li><a href="<?= BASE_URL.'/stuff' ?>">Stuff</a></li>
			</ul>	
		</div>
	</div>

	<main> 
	
		<?= $content ?>

	</main>	

</body></html>	