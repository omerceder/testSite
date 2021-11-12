<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testsite' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'C1SCw>g^iboRx3Soy:x!zU;%OUhcbA63`gEiQ!tgY#{hr4P?7AIKF5%aEF3Px3s5' );
define( 'SECURE_AUTH_KEY',  'VaDuV@tZ.^TgNcx9!<6TZPeFL)wMHV2y}2LDK8Oi6h_+f|_N+/}-c%:>ZCq@3=Y4' );
define( 'LOGGED_IN_KEY',    '6_?d* m{O?CJ@$E~k,n3yV{$|{X]UJ79iRtlOf2bZLitlAEp7Tck=2zs(iy>,LN9' );
define( 'NONCE_KEY',        '5FLji)&}^x]Ptbe{m_v81]?Llm~-sg_#idjYs{D}.2smaFY_!3XZ[IslCs}@AxPq' );
define( 'AUTH_SALT',        '%^d@<RU9lk>/3o*UdCZR~>@9M!>@D11#ohH}716J&-Gx3?+q$f3cZaLS>?-X:U.8' );
define( 'SECURE_AUTH_SALT', 'jFYF3/r<<XCMTtC^q!igx*`4,$VrvuV<{brcw8;,kk!V&?/?m;>xq=IYHa<)tKp/' );
define( 'LOGGED_IN_SALT',   'b>Ipg.&`~zePqB@jR+S,?1|i|PFU)yDTEhv?OfsY|c@~wDd%c-hGJ25G||QVteZh' );
define( 'NONCE_SALT',       '#qw)_@4sh;Ke9uzly~NJO,19eU`JuDya2qTJ}}Br-$2}t=ZWyt#g%_Okw3]pQ$@m' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
