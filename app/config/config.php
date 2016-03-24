<?php 

use 
	Phalcon\Config
	;

$env = CONFIG_PATH . 'env' . DIRECTORY_SEPARATOR . APP_ENV . DIRECTORY_SEPARATOR;

$getConfig = function($file) use ($env) {
	return file_exists($file = $env . $file) ? require_once($file) : new Config([]);
};

$autoLoadConfig = $getConfig('AutoLoad.php');
$servicesConfig = $getConfig('Services.php');
$sharedServicesConfig = $getConfig('SharedServices.php');

$config = new Config([
	'auto-load' => $autoLoadConfig,
	'services' => $servicesConfig,
	'shared-services' => $sharedServicesConfig,
	]);

unset($autoLoadConfig, $servicesConfig, $sharedServicesConfig);

return $config;

 ?>