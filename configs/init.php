<?php


// Create Forword slash define
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Create Folder link
define('SITE_ROOT','C:'.DS.'xampp'.DS.'htdocs'.DS.'mhazarat');

// Create Include folder link
define('INCLUDES_PATH',SITE_ROOT.DS.'includes');

require_once('constants.php');
require_once('functions.php');
require_once('class/session.php');
require_once('class/database.php');
require_once('class/db_object.php');
require_once('class/user.php');
require_once('class/teacher.php');
require_once('class/time.php');
require_once('class/lesson.php');
require_once('class/daily_info.php');
require_once('class/department.php');
require_once('class/day.php');
require_once('class/year.php');
require_once('class/month.php');

?>