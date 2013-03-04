<?php
include_once 'Langue.php';
Langue::init('lang',array('fr','en','es'),'en');
if(!empty($_GET['lang'])){
	Langue::changeLocal($_GET['lang']);
}
?>
<html>
<head>
	<title></title>
</head>
<body>

<h1>page <?php echo _("Accueil"); ?></h1>

<p><?php echo _('Veuillez saisir votre nom'); ?></p>

<p><?php echo _('Merci pour votre participation'); ?></p>
</body>
</html>