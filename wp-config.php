<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vardhaman' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Admin@123#@!' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'FS_METHOD', 'direct' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Tuws c5>VFSCZ%B~JNU,a!(SFid5/{&Lo49`vula(X&VGd9rC8BvPDLJJTXK*g@6' );
define( 'SECURE_AUTH_KEY',  'MaS/F(3Opu0[]/r,cg2gkjY9C+wX@+E8vtw%nfTLTa=hn(~lExhy{P!LpgKp(ndz' );
define( 'LOGGED_IN_KEY',    'K.D455g2+FJ.($]f0!OAd-cKrA_)G]&p2fsQG$|yFjofv$vU.J;t]3KOz]4!?pc4' );
define( 'NONCE_KEY',        'nWFyN=Ei33Y-h4&<Jok-/Qa|bEYA,=V}s2`O=4YAroie>Di9g(DcJz#Prg}SIh|C' );
define( 'AUTH_SALT',        'e6DH,)KRa3}?/vhGqS,6?Ij9BJJRC*~WqxXGb>,RLE.R!40|F?)C*2~;{;/vSp^9' );
define( 'SECURE_AUTH_SALT', '3k[#[X|iQE6shShTWt@URw;pVrOwGvvIH1qRbfGt.As]a`$6TUtJNDV!lO.c<%~<' );
define( 'LOGGED_IN_SALT',   '7K#D-_MErf}*Z@{td#QnNqY]?60cg #TD_6jr!v[a2=wRK-@/H/@D1@|`aIvEZ/I' );
define( 'NONCE_SALT',       '1x#}dDz,QDv{,:Ee8E2$Fb]>S+*9*T*0p.AJLk}Q=yHi+O}W4c,K09oWp_=]-ef_' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
