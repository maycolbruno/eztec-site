<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'eztec_prd');

/** MySQL database username */
define('DB_USER', 'eztec_prd');

/** MySQL database password */
define('DB_PASSWORD', 'gxkEaebLrfrwvtDg');

/** MySQL hostname */
define('DB_HOST', 'eztlx01');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_MEMORY_LIMIT', '1024M' );
define('FORCE_SSL_ADMIN', true);
define( 'FORCE_SSL_LOGIN', true );
$_SERVER['HTTPS']='on';

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'Q?}s+KbWldt$GN}ng/yl64~s@EDO$Uv|6mKVY[(*M{ts!@L OX(qfC=aRk_*SJ>R');
define('SECURE_AUTH_KEY',  'p<1RoM]2$>x*vQww}=XZDQr-3i0v[|+KL.30)*Kb5;otr:L3[jfK|y<bj[3u7zS3');
define('LOGGED_IN_KEY',    '<lK,wur*,!oU$AQQURV^Pj n?hhlB#TCNgM5AP/3$s?h#g.S<:3}mM!bnLdY)^)/');
define('NONCE_KEY',        'w1c7%CK2y(6r,%s2 ?unuY82VI]C-GJ}|6)q<G&8ss;NU1fbIckd>Bhtd~|eX=3t');
define('AUTH_SALT',        '~(HZ2&94scVs@* vGB~rX3/,,~U!q}5Nl:y4aVJ[WL.Mkq%1Fzas6z>aSaO`h*Gd');
define('SECURE_AUTH_SALT', '*0a3#Ob_a,$9E|!elEhZTsbL[`$w4;r7x)95cP^ql9nQ4hazwE;GF9V1SA0qVSe@');
define('LOGGED_IN_SALT',   'auzmy@*Y}]cr8qk&$n%c`XEDKM/9LfRcAJV[rsqxZ AE9RA`fHTy_$p==BU5mjJT');
define('NONCE_SALT',       'shRGF7:3*1E]Lhd4~NQ@vHpud=oWczuYjMZgMxhVaA6(cCioZ!axV 4epuXh/4c#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ez_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('DISABLE_WP_CRON', true);
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
