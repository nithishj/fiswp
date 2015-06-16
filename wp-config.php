<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'Flyinstyle_WP_RDS');

/** MySQL database username */
define('DB_USER', 'FIS_WP_ADMIN');

/** MySQL database password */
define('DB_PASSWORD', '4emc9122');

/** MySQL hostname */
define('DB_HOST', 'flyinstyle-wp-rds.cp6htk7jbck4.us-east-1.rds.amazonaws.com');

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
define('AUTH_KEY',         'N6F]aReq(f]k8Dd[n%1vRIZc| PmL(9M|CUA$[y:(V/Qf(P@f1ho.>=SP,=<%+^7');
define('SECURE_AUTH_KEY',  'r,4m4Gv([F/+)v1u`U|}txnK.tPo&0D+$m0E%1diO}saO-q}}ls8|):d&XwfD{Gs');
define('LOGGED_IN_KEY',    'K-$|^dDzvr,nAfLwEiY@(:-{R%Uu-jxTaYx!AGBl8*`Dqoc%g.*@%3?_<G#PO+>s');
define('NONCE_KEY',        'DH$W4!,<IH[P(M.^N[.)CRc@BJU9Lxamfw~JD?zVUr#M`6CeIoV-1[+>w}88m**v');
define('AUTH_SALT',        '3A:AVcP4DU[acc3rD2eAqs@P*G&WToO[;hhE?S4[!BA39(4||bwhV1(yC.FKoU`I');
define('SECURE_AUTH_SALT', '_V5*h,L}LrdNtq$XdC;tHE2T{w}8^+HvRVk9|cb<9,P~sfNp k6oRa3kV%>^|t>*');
define('LOGGED_IN_SALT',   '`q-^ql:-C7Fes-u;22L1F^b5#>?V#Myk.*$ psM~XMvp]Y/kE5L.]d48lV[ChGYV');
define('NONCE_SALT',       '#.gbz2_YD9lo-EF<ZY>5n0~b9Tr$NM!vvKQk2or|*NA@c.;pQPZZC]QF8?vb7(_H');

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
