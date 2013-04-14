<?php
/** 	
 * Ёто действие провер€ет валидность PHP кода. 
 *  од передаетс€ через POST.
 * ≈сли код не валидный выводит invalid
 * http://habrahabr.ru/post/136138/
*/
class PHPValidatorAction extends CAction
{
	public function run()
	{
		register_shutdown_function(create_function('','	
			$e = error_get_last(); 
			$errorsToHandle = E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING;
			if(!is_null($e) && ($e["type"] & $errorsToHandle)) 
			{
				$msg = "Fatal error: ".$e["message"];
				yii::app()->errorHandler->errorAction = NULL;
				yii::app()->handleError($e["type"], $msg, $e["file"], $e["line"]);
			}
		'));
		yii::app()->onError = create_function('$event', ' 
			ob_get_clean();
			echo "invalid";
			Yii::app()->end();
		');
		ob_start();
		eval(CHttpRequest::getPost('code', ''));
		Yii::app()->end();	
	}
}

?>