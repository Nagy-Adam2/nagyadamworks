<?php

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define('DB_NAME', 'nagyadamworks');

/** MySQL felhasználónév */
define('DB_USER', 'nagyadamworks');

/** MySQL jelszó. */
define('DB_PASSWORD', '');

/** MySQL  kiszolgáló neve */
define('DB_HOST', 'localhost');

/** Az adatbázis karakter kódolása */
define('DB_CHARSET', 'utf8');

/** Az adatbázis egybevetése */
define('DB_COLLATE', 'utf8_general_ci');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszőleges mondatra.
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'írjunk ide valami nagyon bonyolultat');
define('SECURE_AUTH_KEY', 'írjunk ide valami nagyon bonyolultat');
define('LOGGED_IN_KEY', 'írjunk ide valami nagyon bonyolultat');
define('NONCE_KEY', 'írjunk ide valami nagyon bonyolultat');
define('AUTH_SALT',        'írjunk ide valami nagyon bonyolultat');
define('SECURE_AUTH_SALT', 'írjunk ide valami nagyon bonyolultat');
define('LOGGED_IN_SALT',   'írjunk ide valami nagyon bonyolultat');
define('NONCE_SALT',       'írjunk ide valami nagyon bonyolultat');

/** A  könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

?>
