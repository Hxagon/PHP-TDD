<?php
namespace PHPTDD;

class RouterService
{
	private $configHelper;
	private $routesConfig;

	function __construct()
	{
		$this->configHelper = new ConfigHelper();
		$this->routesConfig = $this->configHelper->getRoutes();

		print_r($this->routesConfig);
	}

	/**
	 * @TODO Get a nice way to determine which controller should be called
	 * @param string $requestUri
	 * @return object
	 */
	public function getController(string $requestUri)
	{
		$controllerClass = 'IndexController';
		$instance = new $controllerClass();
		return $instance->indexAction();
	}
}