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
define('DB_NAME', 'wp-dev');

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
define('AUTH_KEY',         'ec2]n lz{L,iune~hLle}:[[0xEG*:L{wf)w{s7A9<BN+3}9@)%Er0*A,xAcC.Sh');
define('SECURE_AUTH_KEY',  'afcMcvyeUsTP.h)2ftbH`xE{.FrOD<5sgg2P_TA]2G/u{DL[bo$)vaYW1<d9]8hQ');
define('LOGGED_IN_KEY',    'U`0ET@{*N`<;Qo:!h>F ;4x}9+5l6(f&<8FLIs>!@dXJ]yMd9KDq, Pw+O+37@nj');
define('NONCE_KEY',        'kL^$dj49wJ:%/58pr5#yvvR4VfD()fWw&0H<Nq8/A#~7yB-BXrB;B;M.~Jrpzx]=');
define('AUTH_SALT',        '^oTS.LY4~r)UPZ?U)daTz^+c2yJ9f:M(,wc#>@PZ1/o/e21apV#h[hAK3?lE`2i*');
define('SECURE_AUTH_SALT', '1G)&jQmuH?Q,4pL0.fxYraxC@3Y.ND5#rFuPk^03g7o-hAOJEr|805W[8ymkuG*b');
define('LOGGED_IN_SALT',   '%i9fe61 .[^p-GD+y9vOV|g7SY0ZP]Z8l! Wqx-|7IDrBP1+!/ca*7BeDHQs2E-Z');
define('NONCE_SALT',       '(9=y|flI!9ey>qo 2cxCeVE;`*RKPfyfHW>:<O2pp$u2Edo-l`B@r2c50=o=:epz');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wpdev';

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