<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gaiacene');

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
define('AUTH_KEY',         'F@;p6_-&F[R<;&_e#R+(OUjwX{gBls,4[| :Ei<gqm~)~U4[!_xC(,v*eM<8#yPN');
define('SECURE_AUTH_KEY',  '8:,d8o~Tz)kyX4N7_$CrLu#ci:x/!NquDY|oup;Ovx0,_dngQ)`}cx0hP!VO*<u[');
define('LOGGED_IN_KEY',    '!Dw5k{uZs5++2vo-K u2sb2yDGj Yv~8,{mSaJKu^()>$wo9s&LgY@(iUr71QSqi');
define('NONCE_KEY',        '?+#lI[&4PB,A/0<eI},B?@Ja[|hh#MM6H3=O=,u`KIed,>d6 s+EmI0Qkv@c@4cg');
define('AUTH_SALT',        '{jV<P?hV5uAfcX6x3yH{y8b^sK Q^<,=KEt{I0875@^CE#ny1r V0~2Ac(k9D-27');
define('SECURE_AUTH_SALT', 'GoY,hEjkgBSqt6L)=%{A)Tn|kGk/1n>1M20/_e*}yOIf?+!Xz%3#con_/BJ+%=tH');
define('LOGGED_IN_SALT',   'n%u2/1eE%|_w%;$c*RER nJi+72OFak&YqemQ2WxNo6`R^iG/EodM.AkgBAAym~a');
define('NONCE_SALT',       'rs[~mxOQK+x} 7F|:LrUfc_.p9(qZbjmFF,CT67EdJdTEV;<hj|ld$iRvX&YJ (n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
