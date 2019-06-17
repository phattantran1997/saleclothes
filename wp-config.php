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
define( 'DB_NAME', 'id9395599_83store' );

/** MySQL database username */
define( 'DB_USER', 'id9395599_thanhcong' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Thanhcong11' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xMfJlnk>%jY9pZNs(4jJ05x&AI3<*j3+xgGleq}ub(bPks@)z^KAlsfHP!,47j-y' );
define( 'SECURE_AUTH_KEY',  'U}x+4EK^.<{DC7N~`wtsbvI~#g-hlDA]5P)*Hi$l6aK*UCw9|]=91 rWZlja;Z?n' );
define( 'LOGGED_IN_KEY',    '}].]Y|W-(XV]lLS`0Y,cu.Bg;j|F`40lbJ8(mO5bl}P_nv=4}|(Et<3I&n|q-$VZ' );
define( 'NONCE_KEY',        ':B1%)a#%J_c!;4#B$-*Ru1!gwEQ+urd$o]$N|e,JTs%)<rv4*]R50*rprp4tNu0v' );
define( 'AUTH_SALT',        '6Z<5E-5<hxa;,3/Se{?rXK)(=s)a}#HyGM25Zc Zc-#{r ?3)Kv-j>0Zx.F,9Pg>' );
define( 'SECURE_AUTH_SALT', '$=`uDo2sZ66/~&a77U3%%k&@ymZx+L}3QY:(8Bw(.j!WRu~|=7 23{`@&+3E~piI' );
define( 'LOGGED_IN_SALT',   '&m+P+ddAU&JwuF=ZP:LcPsX{~YSt99EYhAY4jl5R@Wy(R<xF *#[=t0u!uRl~Tn_' );
define( 'NONCE_SALT',       'i^#J[rk tsAM/0#!jq$m:lnr}coo$MCh9(<EW*i7o(@eOc;T=%23R8 plG(b1|5B' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
