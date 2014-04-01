<?
global $MESS;
IncludeModuleLangFile(str_replace("\\", "/", __FILE__));

if(class_exists('garantpark_delivery'))
	return;

class garantpark_delivery extends CModule
{
	var $MODULE_ID = 'garantpark.delivery';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;

	function garantpark_delivery()
	{
		$arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - 10);
        include($path.'/version.php');

        $this->MODULE_NAME = GetMessage('GP_INSTALL_NAME');
        $this->MODULE_DESCRIPTION = GetMessage("GP_INSTALL_DESCRIPTION");
		$this->PARTNER_NAME = GetMessage('GP');
		$this->PARTNER_URI = GetMessage('GP_URI');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }
	}

	function DoInstall()
	{
		$this->InstallFiles();
		RegisterModule($this->MODULE_ID);
	}

	function InstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/wizards/garantpark/solution.delivery', $_SERVER['DOCUMENT_ROOT'].'/bitrix/wizards/garantpark/solution.delivery', true, true);
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

 	function InstallDB()
    {
        return true;
    }

    function InstallPublic()
	{
		return true;
	}

	function UnInstallDB()
	{
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoUninstall()
	{
		DeleteDirFilesEx('/bitrix/wizards/garantpark/solution.delivery');
		UnRegisterModule($this->MODULE_ID);
	}
}
?>
