<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gotogodavari');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1QOgEMPZ<*X@h>FHl8:Wdo gk;CBWiWI=RLg>/qq^CP!y_nJ64?^XV>b<7YZ!4Gm');
define('SECURE_AUTH_KEY',  '-?}>@^>9|D?>,`h+qe!xOvy]`an~Ev?rA0uXTExP5O_/bL{4uhUq/iqa-OEW]B$)');
define('LOGGED_IN_KEY',    'IRA(pfy;h@WcDTyY+Xl[15N1l9AP#bZ?`z:C/W63*(qDIp:j+typ`4%?,5:IZ2R/');
define('NONCE_KEY',        'nT*bmILmY[k9fnEn[C34wMMpMBY8d[,/%>r].AEkJ?@u5!{D?v!p{~D+S#k?7}}V');
define('AUTH_SALT',        'fL5}7f&VueA;n2`iCP*s4}zyXYTMY3UO(KPhv{fkAGDy7lML.Ad&Z}wkG4(1}~ix');
define('SECURE_AUTH_SALT', ']djza@aZXBl;f r Xwa){`.iK s@37!OV7vBSMTOamH]x*BNIlGesnf#4?ptfb~w');
define('LOGGED_IN_SALT',   'CFq~{m$qzZq&qslH#/dNq)rq{%s8!YztAGEw*GFj7BUyQ6A&wCy9xh/hLz;wxlEs');
define('NONCE_SALT',       'W#USoTdm9C>?p.#SP],9YaO!8J<QJ9n+9m!DVGnoVR85s=6a5hRUL3.glIIN&akP');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
