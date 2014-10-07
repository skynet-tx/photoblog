<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'video_blog');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DDTXu|g3Lrq-mg00Wn1!{X{0e>=W=tH>P-tXt55H7V&qVQOr}@/73GEfP@$!rge_');
define('SECURE_AUTH_KEY',  'V{)biM).l.8.Vf|8QXKPDSd^+@42It+;jffm?qlK$B~;uEN|^-1^yLl8qYW0y>U?');
define('LOGGED_IN_KEY',    '/3t+,V~M6!mJ2Nk``:-5z]>M@+b!0Dd9-_pYd}~waE*+a0@Fj]<sb*(Yd+5C mH+');
define('NONCE_KEY',        '!C;.+3EC|9l[.%;TzLPl:8>?(~[~M=aPPbT Ov^xwey-gP|2^,nuXP#F^>;<%WB ');
define('AUTH_SALT',        'm~*&tzoe,-Tg+!_d7pFJvHKNrPxY+n=Qn|$(oq8v9b6PC.BQhPmwN=?s`f*j&{se');
define('SECURE_AUTH_SALT', 'Go%wEQd|65]?i}|5o9d2a`(B)~^(Ub3%~J1GR`KBtrqV0*Z$S.K.rZ(}YV/i%$+)');
define('LOGGED_IN_SALT',   'cwBMQh78sQ=qL|MGWV!~<wS/|+b#!UmA XA2U0POW<h-#.+|yM>s?!JtN*]K<5a_');
define('NONCE_SALT',       '_jf?>@Ep)4Cv3ph5>A7Chxp/&Rwd,6agNODX3@V;1JfWWLls<wo&#kKs>R;=JTci');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'sk_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
