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

	private function setLayoutPath()
	{
		$this->layoutPath = realpath(PUBLIC_ROOT .'\\..\\src\\view\\layout');
		echo $this->layoutPath;
	}

	/**
	 * @return string
	 */
	public function getLayoutFile()
	{
		return $this->layoutFile;
	}
}