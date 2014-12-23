<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/web/iconeo.fr/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'iconeo');


/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'iconeo');


/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'iconeo339');


/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');


/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2E143@V-WAyGo^O~8Qv(%zZG8w% 3,ZE.RT[AYLR!au>>4Ai-zGhGo6E8x(q|5Hf');

define('SECURE_AUTH_KEY',  'W4^N[QkVU)@.JI_?-ZY-U5MR[GZsgNEuD:f0gD&]6gsP-~4~zJyR9T9Kl0.=i-+?');

define('LOGGED_IN_KEY',    'J,J#G6<WyPm,s((;?B44USx;XLu.axXZWBk|FEosCh2g_<$+-u<EGhUyGzlzv>u,');

define('NONCE_KEY',        'OU;VDwzeL/9& AEx-dr*:d-x.?mM(Wf|R2<9r)XDCE`)gUN0;?|FJz?c{`3+_L7m');

define('AUTH_SALT',        'EV?!63L*>X9A},:dciq5}W@{I([bP]x|y,3jSotX&7 )2|u+>IL}1t^FdRP7:ql;');

define('SECURE_AUTH_SALT', '+PU@|k<v>E-mCvU|y{$ pfEd^e|EEGT+%EJ>mX7KS_CvrKX2+Et&/ 8Fg,I=^o=M');

define('LOGGED_IN_SALT',   ' gk+o)/E6SQdQLuGSur9*!uA4X}UFcRFI{^|iBr?y9d}hv;OxRN1bp;d>cW{FZrR');

define('NONCE_SALT',       '1!L%x=V0A`sHn2o;(Z>+{c-^ho$L){B`^$Yo5Hr:Dg|+w=jG7s<5Q}00Anu7Uz41');

/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';


/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');