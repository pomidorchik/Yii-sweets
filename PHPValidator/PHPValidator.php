<?php

class PHPValidator extends CValidator
{
	public $code;

	protected function validateAttribute($object,$attribute)
	{
		if(!is_null($object->$attribute))
		{
			$url = Yii::app()->getController()->createAbsoluteUrl('PHPValidation');
			$data = http_build_query(array(
				'code' => is_null($this->code) ? $object->$attribute : preg_replace('/{code}/', $object->$attribute, $this->code),
			));
			$opts = array('http'=>array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $data
			));
			$context  = stream_context_create($opts);
			$result = file_get_contents($url, false, $context);
			if($result==='invalid')
			{
				$sl = Yii::app()->sourceLanguage;
				Yii::app()->sourceLanguage = 'en_us';
				$this->addError($object, $attribute, Yii::t('PHPValidator.message', 'Invalid PHP code'));
				Yii::app()->sourceLanguage = $sl;
			}
		}
	}
}


?>