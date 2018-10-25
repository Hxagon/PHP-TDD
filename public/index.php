<?php
namespace PHPTDD;
require_once '../vendor/autoload.php';

if (!defined('ROOT_DIR')) {
	define('ROOT_DIR', pathinfo(realpath(__DIR__))['dirname']);
}

if (!defined('PUBLIC_ROOT')) {
	define('PUBLIC_ROOT', dirname(__FILE__) . '/');
}

$configHelper = new ConfigHelper();
$env = $configHelper->getProjectEnv();

// Setup error reporting
if ($env === 'dev') {
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
} else {
	ini_set('display_startup_errors', 0);
	ini_set('display_errors', 0);
}

// Layout and template
$templateService = new TemplateService();

if (!defined('LAYOUT_PATH')) {
	define('LAYOUT_PATH', $templateService->getLayoutPath());
}

ob_start();
include $templateService->getLayoutFile();
$layout = ob_get_contents();
ob_end_clean();

// Get content from specific controller
$router = new RouterService();
$controller = $router->getController(pathinfo($_SERVER['REQUEST_URI'])['basename']);

echo $layout;
