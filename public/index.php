<?php
namespace PHPTDD;
require_once '../vendor/autoload.php';

const PUBLIC_ROOT = __DIR__;

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
echo $templateService->getLayoutFile();