<?php
namespace application\libraries;

use Exception;

class Application{

    public function __construct(){
	
        if (isset($_GET['url'])) {
            $urlParams = explode("/", $_GET['url']);
        }
	
        $params['pageType'] = isset($urlParams[0]) && $urlParams[0] != '' ? $urlParams[0] : 'error';
        $params['action']   = isset($urlParams[1]) && $urlParams[1] != '' ? $urlParams[1] : 'list';

	try {
		if (!file_exists('application/controllers/'. $params['pageType'] .'Controller.php')) {
		throw new Exception('controller does not exist');
		}
            
        }catch (Exception $e){
		$params['pageType'] = 'error';
        } finally {
		$controllerName = '\application\controllers\\'.$params['pageType'].'Controller';
                new $controllerName($params['pageType'], $params['action']);
        }

    }
}




