<?php
namespace PHPTDD;

/**
 * Class TemplateService
 */
class TemplateService
{
	private $layoutFile;
	private $layoutPath;
	private $appConfigTemplate;
	private $configHelper;

	/**
	 * TemplateService constructor.
	 */
	function __construct()
	{
		$this->configHelper = new ConfigHelper();
		$this->appConfigTemplate = $this->configHelper->getConfigTemplate();
		$this->setLayoutPath();
		$this->setLayoutFile();
	}

	private function setLayoutFile()
	{
		$this->layoutFile = $this->layoutPath . $this->appConfigTemplate->layout;
	}

	/**
	 * @TODO Get a better handling for the paths, could be a problem on linux
	 */
	private function setLayoutPath()
	{
		$this->layoutPath = realpath(PUBLIC_ROOT .'\\..\\src\\view\\layout') . '\\';
	}

	/**
	 * @return string
	 */
	public function getLayoutFile()
	{
		return $this->layoutFile;
	}

	/**
	 * @return string
	 */
	public function getLayoutPath()
	{
		return $this->layoutPath;
	}
}