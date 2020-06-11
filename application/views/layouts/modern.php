<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />	 
    <meta name="viewport" content="width=device-width, initial-scale=1" />  
	<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <![endif]-->

	<title><?= $title ?></title>

	<link href="<?= ABS_URL.'/public/skins/'.SKIN.'/img/icons/empire-icon-16.png' ?>" rel="icon" type="image/png"  />	
		
	<link href="<?= ABS_URL.'/public/skins/'.SKIN.'/css/layout.css' ?>" media="screen" rel="stylesheet" type="text/css" />	
</head>
<body>

	<div id="page">
		<div id="page-top">
		</div>
	
		<div id="menu-box">
			<div class="info-box">
				<h2>Mini CRM</h2>
			</div>
			<nav class="navbar" id="side-menu">  
				<ul>
					<li><a href="<?= ABS_URL.'/' ?>">Home</a></li>	
					<li><a href="<?= ABS_URL.'/store' ?>">Склад</a></li>
					<li><a href="<?= ABS_URL.'/clients' ?>">Клиенты</a></li>					
					<li><a href="<?= ABS_URL.'/orders' ?>">Заказы</a></li>
					<li><a href="<?= ABS_URL.'/lids' ?>" onclick="alert('Coming soon!'); return false;">Сделки</a></li>
				</ul>	
			</nav>		
		</div>
		
		<div id="page-content">
		
			<?= $content ?>
		
		</div>	
	</div>


</body>
</html>	