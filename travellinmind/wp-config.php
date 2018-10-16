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

define('DB_NAME', 'travelli_dbase');



/** MySQL database username */

define('DB_USER', 'travelli_dbase');



/** MySQL database password */

define('DB_PASSWORD', 'xC6Sw3pFbhrN');



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

define('AUTH_KEY',         '?28S.|r[KQh7:8_9IhJ%2@.< ;(4};vOW@p:8Hz?LeJN!+V?8>nb~oVvVwQh3~Ph');

define('SECURE_AUTH_KEY',  'N8XL7UdggDIJunja8+{Oo0HMSH8M0o+ZEIlr;Y`?F?!T<.Kfm1wIat/#Bh5D_S$V');

define('LOGGED_IN_KEY',    '_>.dF4f=F9C]BKk2tn+.$zT![tI[)t2tWNvOQR)D@9;qAU`Q=(P4el6c0[m;q&:d');

define('NONCE_KEY',        '(ZH9kCLH@UwR=yZ:.XD@VtV=I2|f)Uds4DKh.v}h7=1[luYY_/ZtR+uKiwTi<9B/');

define('AUTH_SALT',        ' |zVAInP:}@HP=/C 6j4zx/0CUbLp[L$z[H~kt2@shPsT*6@GX,~L`4U(]{b:2E5');

define('SECURE_AUTH_SALT', 'P THot(u(8D^N Qh&cW/jJB:9+yE CdkG=T&i<w3MkRqr|^)NT9.m-:U9j8%$8kg');

define('LOGGED_IN_SALT',   'Qf(F`s.vWA9X*:r/ls46g/6Qu<;U4%bfeJY$|zj<m!n< M5p[%j-|~Z=Z$XYZ5O{');

define('NONCE_SALT',       'T[m8?qGODK1FY-@~m:d{<},w^qqU>GGshT|xYZK$CJK+@sc2o5VK$r&O.MP7:`Me');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'tm_';



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

