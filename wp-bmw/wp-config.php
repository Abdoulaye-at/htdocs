<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>#^e=t9>HZl*%7Cu;<HL+4b./pI* e|!SR4Ws-Y{!VujLibhLT P)wZzsdu9YQab');
define('SECURE_AUTH_KEY',  '?fyWCl,fVsfU[^2=Zab4(Dfghx5r8AHv8Aa!pn=Wnrn`~>kL~,|gTW`$UsHmPKLI');
define('LOGGED_IN_KEY',    'Q%{x4i7aK-P.eI]1`*a8Y@+3y,ce ~uv#{d!<;V$]0%#.%z4Y:>U;Vo]Ug>97eoA');
define('NONCE_KEY',        'NC#w~FoWh(JdCJXT Yip<MDppgeUjR?|`9W88F1rJm2mI=}m9;eK{<:{+Hsb0.4]');
define('AUTH_SALT',        '[],#$!+^ 1 Mja}N*5w*h[7J!c!)8nfL$&13g9k1v};:`t=nA>VW_]~mariPq:0B');
define('SECURE_AUTH_SALT', '%{0:C/FK^gKgk*2RG5 a%U*%-[t>ClKN0eI)7 `z/~Zf6,3=<Bg@LBbHNm(uA~c`');
define('LOGGED_IN_SALT',   'Be V1 )avK*%k>UShz3={64J&:jua*yq1sA#Z6qC_Yc{T(F5dBZ?uNmg}6PA(vhE');
define('NONCE_SALT',       'H5&&cxL;<i7=ZNH4ivws6UQ5D2+tO;9}aGBK24Jk(h@)DW|jAA3Tja@!^g9;y(WB');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');