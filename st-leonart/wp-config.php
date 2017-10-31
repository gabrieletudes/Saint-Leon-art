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
define('DB_NAME', 'saintleonart');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         'R!-Jz?W>Q=S5(&u0K8TCJ?!uqc@PVxupeRwBG%:2(a~^~atd/xTppFoqLxvmh#hN');
define('SECURE_AUTH_KEY',  '{20gneQ%}=jMaC3(kxogQP/sN]RW4~M=-v7EK4&#Qj2!Df]p4(dn=OcJ-J@^QYIN');
define('LOGGED_IN_KEY',    ')C-j|,N~1XKhhV4N+,W~d5,M<b_WGhvc=uRD)9X{,Qt&mzKQ-BS$thS./Q>erXEg');
define('NONCE_KEY',        ':[5{7605[nb<>,Nd;Lt M@V>KZ)UO NZbNWHu*B7;wm,%Yrp0CVC$Ky<]DYu^[DG');
define('AUTH_SALT',        '{i+Np%2 |~JM^u>#.z^5%`*a`05Bln5T}V[ANA415W3mDr;7Q=Wgr1|YC9_YML}D');
define('SECURE_AUTH_SALT', ')LS@cb,Q}Q{`H75T>jj@n@u?+#tUnl,v(|KY-Y*mCniaV3Do|;fF3@-AD{DTL:o-');
define('LOGGED_IN_SALT',   'uJxkms5=+8&66iw(.hWZJYy-j^RN1uwBzb4H=$ w1H-++:JZw@) SPZ/brUxnXj!');
define('NONCE_SALT',       ',}i{giC:&=l3$kBgqcP,XdI8HR1/ep4Sg0@;|z%p+hD$shbCs,4]uqe+_jKI%&.B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'stleo_';

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
