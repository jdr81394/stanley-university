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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '89bfpn6b+OBKheDSPx0ECVOvzLuFszcSyk9XRXastwBvFgHF84/Ml4kfdVLnBe9qqVtxcF11MPjlrmw8Sjh2og==');
define('SECURE_AUTH_KEY',  'u7+L61ctAV47s9PazpqbHvWeYjkwFPVL6VGSJ4T/gF/ZeQDNAgd/vlcWeGmOrU1X5Ed1lcx/a9xL+qt6lhN4Eg==');
define('LOGGED_IN_KEY',    'OfQ74EO4Q2WblOaA4AkvlyhOR/ITWh+7MpECEfhn3Y0s8S8wnCJ+yZI0ZgZLuzfcCk/MnJFlgwMcSGD0H0ibWw==');
define('NONCE_KEY',        'vPliCcUco9NUyy/nCF5kN5iqboTMIt9jVH2HtTocthnSaQqop3Wp2g10tvy7IHh1zQbt/kux5G6ay+HJuPcrsw==');
define('AUTH_SALT',        '6I6DXI3o02GD67lrDSIsMmHzN5Kxuc6XKDpIvf5LSHsoRUoKo+QfzoOCsL++s6M7vKk1Lzmre9WHpkqUmLJM6w==');
define('SECURE_AUTH_SALT', 'H6/ElmIkr0YyaNmSPgcY08hxCau+VYBcknK6h4mCDPzcFWbJ8TkJ0fFw6oCNP9qB/9WiqPQ0kV9JTdu0oEN7HA==');
define('LOGGED_IN_SALT',   'gnrI+5ddJQOvhsiL7AH47HNymcfduX4VSU/ypqOxskhUyV69W/lFWkBLtn4vQYtVCT/yLK02uJMsu5VHot/CZw==');
define('NONCE_SALT',       '6a5kq70bBNKZsB/J/VVNrUFSa51nN23kcMnvMpie6RRmRKKX6fVogk04m18DjOBwm0AG5NYZbcNkx2UE7QnyQw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
