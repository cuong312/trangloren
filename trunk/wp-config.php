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
define('DB_NAME', 'wp4');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '_U+ [=O-trPfO.hACt?>BCewt|*&y0QTEl>]*|PNQ9ISxOYkLZY.MIY&AvKkwoAa');
define('SECURE_AUTH_KEY',  'YFI0 W=`P$dta-^OdyHj@.OJ%{]$v;g::(Uz]k{>?6vR%MIXA?DV-9C6_<0lY R7');
define('LOGGED_IN_KEY',    '!1o^YbZC6&X0)<` K<Z(o_7ETOK+-/IGE,hi[q9!_btlg3t)]r7kYpY>f`kVGFcp');
define('NONCE_KEY',        '[D:Sduc8_un58%j+_*|j!2MC/vG-mR||g!fOG!.2/uXmB~l-6Dy?eXVeRWPtx2[]');
define('AUTH_SALT',        'GKH>MpE$*/HAX}N{FgO0tx>^3iCOAw@FmifCmo>60%37B<o~Sr%H,oiyt2n7fCmE');
define('SECURE_AUTH_SALT', 'eH~iik$!bDyzC3vGw=wP|%qofm]]Ahd}sON79f1J)|+}8`m5bN@~Y?v]Fjjij;tg');
define('LOGGED_IN_SALT',   '^^X|gV@44[t3/c*+CmL97C2PW{Um-$Je>oH@-3&I+9<L8:ys_xHrM`,vh-WMTNEa');
define('NONCE_SALT',       'ipKvbHM])bj|m%o!?,|j]@Xv1TM,DbtnBD{TP7OdWX$c56_Alojoa}!T!^2*NgCW');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
