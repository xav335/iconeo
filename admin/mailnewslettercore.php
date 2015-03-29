<?php include_once 'inc-auth-granted.php';?>
<?php include_once 'classes/utils.php';?>
<?php 
require 'classes/Newsletter.php';
require 'classes/Contact.php';

$newsletter = new Newsletter();

if (!empty($_GET)){ //Modif 
	
	$result = $newsletter->newsletterAllGet($_GET['id']);
	//print_r($result);
	if (empty($result)) {
		$message = 'Aucun enregistrements';
	} else {
		$id= 			$_GET['id'];
		$titre=  		$result[0]['titre'];
		$date= 			traitement_datetime_affiche($result[0]['date']);
		$bas_page= 		nl2br($result[0]['bas_page']);
		$detail=		$result[0]['newsletter_detail'];
	}
} else { 
	echo 'Erreur contactez votre administrateur <br> :\n';
	exit();
}
?>

<?php
$urlSite = $_SERVER['HTTP_HOST'];



$corps = <<<EOD

<html>
<head>
<meta charset="utf-8" />
<title>Newsletter ICONEO</title>
<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Open+Sans);
	@import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300);
	
	body {width:100%;height:100%;background:#fff;font-family:'Open Sans Condensed', sans-serif;font-size:23px;color:#515050;}
	p {margin-bottom:10px;font-size:18px; padding: 10px 10px 10px 10px; }
	h1, h2, h3, h4, h5, h6 {font-weight:normal;}
	h1 {font-size:37px; font-weight: bold;text-transform: uppercase;}
	h2 {font-size:24px;font-weight: bold;text-transform: uppercase;padding-left: 10px;padding-right: 10px;}
	h3 {font-size:16px;text-transform: uppercase;padding-left: 10px;padding-right: 10px;}
	hr {height:2px;color:#969696;background-color:#969696;clear:both;}
	.bleu {color:#39bcd6;}
	.vert {color:#7aac11;}
	.jaune {color:#e3a91f;}
	.fuschia {color:#ed4a8c;}

</style>
</head>
<body>
	<table width="640" border="0"  cellpadding="0" cellspacing="0" >
	<tr>
	    <td align="center">
			<div style="text-align:center;  margin-left:auto;margin-right:auto; width: 554px; border: 4px ridge white; padding:20px 20px 20px 20px; ">
				
				<a href="http://www.iconeo.fr"><img  src="http://www.iconeo.fr/newsletter/logo.png"></a>
			
				<h1>Les news Iconeo</h1>
				<hr>
				
				<table width="554" border="0"  cellpadding="0" cellspacing="0" >
				<tr>
	    			<td valign="top">
	    				<h2 class="bleu">La piscine est réparée et à 32° </h2>
	    				<p >Notre piscine est enfin réparé, nous avons mis tous les moyens afin que vosu puissiez retrouvé le fleuron de notre club dans un état impeccable.
						Encore toute nos excuses pour ce désagrément et à très bientôt. B'Sportez vous bien !!</p>
	    			</td>
	    			<td valign="top">
	    				<a href=""><img width="254" src="http://www.iconeo.fr/uploads/bsport3.jpg"></a>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<h3 class="bleu">WEB DESIGN - DEVELOPPEMENT RESPONSIVE - PLV</h3>
	    			</td>
	    			<td align="right">
	    				<a href=""><img width="104" src="http://www.iconeo.fr/newsletter/gobleu.png"></a>
	    			</td>
	    		</tr>
	    		</table>	
				<hr>
				<br>
				
				<table width="554" border="0"  cellpadding="0" cellspacing="0" >
				<tr>
					<td valign="top">
	    				<a href=""><img width="254" src="http://www.iconeo.fr/newsletter/facebook.png"></a>
	    			</td>
	    			<td valign="top">
	    				<h2 class="fuschia">La piscine est réparée et à 32° </h2>
	    				<p >Notre piscine est enfin réparé, nous avons mis tous les moyens afin que vosu puissiez retrouvé le fleuron de notre club dans un état impeccable.
						Encore toute nos excuses pour ce désagrément et à très bientôt. B'Sportez Notre piscine est enfin réparé, nous avons mis tous les moyens afin que vosu puissiez retrouvé le fleuron de notre club dans un état impeccable.
						Encore toute nos excuses pour ce désagrément et à très bientôt. B'Sportez vous bien !!</p>
						
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<a href=""><img width="104" src="http://www.iconeo.fr/newsletter/gofuschia.png"></a>
	    			</td>
	    			<td align="right">
	    				<h3 class="fuschia">FORMATION</h3>
	    			</td>
	    		</tr>
	    		</table>	
				<hr>
				<br>
				
				
				
				<table width="554" border="0"  cellpadding="0" cellspacing="0" >
				<tr>
	    			<td valign="top">
	    				<h2 class="vert">La piscine est réparée et à 32° </h2>
	    				<p >Notre piscine est enfin réparé, nous avons mis tous les moyens afin que vosu puissiez retrouvé le fleuron de notre club dans un état impeccable.
						Encore toute nos excuses pour ce désagrément et à très bientôt. B'Sportez vous bien !!</p>
						
	    			</td>
	    			<td valign="top">
	    				<a href=""><img width="254" src="http://www.iconeo.fr/newsletter/twiter.png"></a>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				<h3 class="vert">SERVICES INFORMATIQUES</h3>
	    			</td>
	    			<td align="right">
	    				<a href=""><img width="104" src="http://www.iconeo.fr/newsletter/govert.png"></a>
	    			</td>
	    		</tr>
	    		</table>	
				<hr>
				<br>
				
				
				
				<img width="554" src="http://www.iconeo.fr/newsletter/pano.png"><br>
				<div >
			      	<a href="https://www.facebook.com/pages/iconeofr/1497532703849844"><img width="50" src="http://www.iconeo.fr/newsletter/facebook.png" ></a>
			      	<a href="https://twitter.com/iconeo33"><img width="50" src="http://www.iconeo.fr/newsletter/google.png" ></a>
			      	<a href="https://plus.google.com/+IconeoFr/about"><img width="50" src="http://www.iconeo.fr/newsletter/twiter.png" ></a>
			      	<a href="http://fr.viadeo.com/fr/company/iconeo"><img width="50" src="http://www.iconeo.fr/newsletter/viadeo.png" ></a>
			      	<a href="https://www.linkedin.com/pub/contact-iconeo/a8/66a/883"><img width="50" src="http://www.iconeo.fr/newsletter/linkedin.png" ></a>
			  	</div>
				<p class="bas">
				
					Si vous souhaitez vous désinscrire de cette newsletter suivez le lien suivant : <a href="http://www.iconeo.fr/newsletter/desinscription.php?id=" >désinscription</a>
				</p>
				
			</div>
		</td>
	</tr>	
	</table>	
</body>
</html>

EOD;

if (empty($_GET['action']) && empty($_GET['postaction']) ) {
	echo $corps;
}	

$corps = utf8_decode( $corps );

$sujet = "Bsport - Newsletter ";
$entete = "From:Bsport <contact@iconeo.fr>\n";
$entete .= "MIME-version: 1.0\n";
$entete .= "Content-type: text/html; charset= iso-8859-1\n";

// TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST 
if (!empty($_GET['postaction']) && $_GET['postaction']=='preview') {
	echo "<br><br><h3>Newsletter de Test envoyee a contact@bsport.fr !!!! </h3><br><br>
		<a href='javascript:history.back()'>retour</a>";
	
	//$_to = "contact@bsport.fr";
	$_to = "fjavi.gonzalez@gmail.com";
	//$entete .= "Bcc: xav335@hotmail.com,xavier.gonzalez@laposte.net,jav_gonz@yahoo.com\n";
	
	//echo "Envoi du message à " . $_to . "<br>";
	$corps = str_replace('XwXwXwXw', randomChar(), $corps);
	//echo $corps;
	////////////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!////////////
	mail($_to, $sujet, stripslashes($corps), $entete);
	///////////////////////////////////////////////////////////
	
} elseif (!empty($_GET['postaction']) && $_GET['postaction']=='envoi') { 
// ENVOI EN MASSE ENVOI EN MASSEENVOI EN MASSEENVOI EN MASSEENVOI EN MASSEENVOI EN MASSE
	$id_journal = $newsletter->journalNewsletterAdd($_GET['id']);
	
	$contact = new Contact();
	$result = $contact->contactGetForNewsletter();
	//print_r($result);
	if (!empty($result)) {
		foreach ($result as $value) {
			$_to = $value['email'];
			$regex = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
			if (preg_match( $regex, $_to)) {
				$codeRandom =randomChar();
				$corpsCode = str_replace('XwXwXwXw', $codeRandom, $corps);
				$newsletter->journalNewsletterDetailAdd($id_journal,$_to,$codeRandom,null);
				////////////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!////////////
				//mail($_to, $sujet, stripslashes($corpsCode), $entete);
				///////////////////////////////////////////////////////////
				echo "envoi OK : ". $value['email'] ."<br>";
			} else {
				$newsletter->journalNewsletterDetailAdd($id_journal,$_to,null,'bad email');
				echo "XXXX envoi KO : ". $value['email'] ."<br>";
			}	
			
			
		}
		echo "<br><br><h3>Newsletter REELLE envoyee à tous les adhérents !!!! </h3><br><br>
		<a href='javascript:history.back()'>retour</a>";
	}	
}	
