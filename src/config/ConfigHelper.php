<?php
namespace PHPTDD;

/**
 * Class ConfigHelper
 * @package PHPTDD
 */
class ConfigHelper {
	const CONFIG_FILES_SOURCE = __DIR__ .'/files';
	private $configFiles;
	private $envConfig;
	private $appConfig;
	private $routesConfig;

	/**
	 * ConfigHelper constructor.
	 */
	function __construct()
	{
		// Read config files
		$this->configFiles = $this->readConfigFiles();
		$this->createConfigFileMapping();
	}

	/**
	 * @return array
	 */
	private function readConfigFiles()
	{
		$configSourceDir = $this::CONFIG_FILES_SOURCE;
		$configFiles = array_diff(scandir($configSourceDir), array('..', '.'));

		// Checking for minimal needed config files to run the app
		if (!in_array('app.json', $configFiles) || !in_array('env.json', $configFiles)) {
			exit('Missing config files.');
		}

		return $configFiles;
	}

	/**
	 * Map JSON to objects for later use
	 */
	private function createConfigFileMapping()
	{
		$this->envConfig = json_decode(file_get_contents($this::CONFIG_FILES_SOURCE . '/env.json'));
		$this->appConfig = json_decode(file_get_contents($this::CONFIG_FILES_SOURCE . '/app.json'));
		$this->routesConfig = json_decode(file_get_contents($this::CONFIG_FILES_SOURCE . '/routes.json'));
	}

	/***
	 * @return string
	 */
	public function getProjectEnv()
	{
		return $this->envConfig->modes->env;
	}

	/**
	 * @return object
	 */
	public function getConfigTemplate()
	{
		return $this->appConfig->template;
	}

	/**
	 * @return object
	 */
	public function getRoutes()
	{
		return $this->routesConfig->public_routes;
	}
}