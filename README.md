#A propos

Vous souhaitez internationnaliser votre site en PHP et vous ne savez pas comment?
Rien de complexe transformer rapidement le langage de votre site sans passer par d'autres libraies complexes (getText par exemple)

##Installation

Il suffit de déplacer le fichier Langue.php dans votre répertoire de travail et de créer par la suite le dossier qui va contenir les fichiers de langues

##Usage

Etape 1 : Inclure la classe Langue.php dans vos fichiers de travail

```php
<?php
require_once 'Langue.php';
?>
```

Etape 2 : Initialiser la classe Langue avec les valeurs nécessaires

```php
<?php
Langue::init($langageDir,$supportedLangages,$default);
?>
```
Expliquons le code précédent:

	$langageDir : le nom du répertoire contenant les fichiers de langue que vous allez créer

	$supportedLangages : un tableau contenant la liste des langues supportés (la liste est créer à votre choix)

	$default : la langue par défaut

Exemple:
```php
<?php
Langue::init('lang',array('fr','en','es'),'en');
?>
```

Etape 3 : Créer les fichiers de langue

Dans cette étape on crée un fichier pour chaque langue, par exemple si vous voulez créer un site en français et en anglais vous devez créer un fichier fr.php et un autre en.php que vous devez les placer dans le répertoire que vous avez choisi dans l'étape précédente dans ce cas le répertoire lang.
Les fichiers de langues doivent être sous la forme suivante:
```php
<?php
//Fichier fr.php
$langue=array(

	"Accueil"						=>"Page d'acceuil",
	"Veuillez saisir votre nom"		=>"veuillez saisir votre nom",
	"Merci pour votre participation"=>"Merci pour votre parcicipation"

);
?>
<?php
//Fichier en.php
$langue=array(

	"Accueil"						=>"Home page",
	"Veuillez saisir votre nom"		=>"Please enter your name",
	"Merci pour votre participation"=>"Thanks for your participation"

);
```

Etape 4 : Afficher le texte
```php
<?php
echo _("Accueil");
?>
```

Etape 4 : Changer la langue

Pour changer la langue vous pouvez adopter la démarche que vous voulez, par exemple tester avec des variables GET ou autres

```php
<?php
if(!empty($_GET['lang'])){
	Langue::changeLocal($_GET['lang']);
}
?>
```

Code complet

```php
<?php
include_once 'Langue.php';
Langue::init('lang',array('fr','en','es'),'en');
if(!empty($_GET['lang'])){
	Langue::changeLocal($_GET['lang']);
}
?>
```

Vous pouvez vous inspirer de l'exemple ci-joint.
N'hésiter pas à la partager avec vos collégues


## Author

[Nassim Bahri](https://www.facebook.com/Bahri.Nassim) ([LinkedIn](http://www.linkedin.com/pub/nassim-bahri/32/b38/a11))