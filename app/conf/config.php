<?

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('CONTROLLER_PATH', ROOT.'app/controllers/');
define('MODEL_PATH', ROOT.'app/models/');
define('VIEW_PATH', ROOT.'app/views/');
define('CLASS_PATH', ROOT.'app/class/');

define('PAGINATION_COUNT', 3);

session_start();

require_once('db.php');
require_once('route.php');

require_once(CONTROLLER_PATH.'Controller.php');
require_once(MODEL_PATH.'Model.php');
require_once(VIEW_PATH.'View.php');
require_once(CLASS_PATH.'Sort.php');
require_once(CLASS_PATH.'Pagination.php');

function isAdmin() {
	$isAdmin = false;
	$status = $_SESSION['login_status'] ?? '';
	if($status === 'Y')
		$isAdmin = (isset($_SESSION["USER"]) && $_SESSION["USER"]["IS_ADMIN"]) ? true : false;

	return $isAdmin;
}

Route::start();