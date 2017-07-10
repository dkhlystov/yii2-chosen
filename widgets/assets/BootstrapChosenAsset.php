<?php

namespace dkhlystov\widgets\assets;

use yii\web\AssetBundle;

class BootstrapChosenAsset extends AssetBundle
{

	public $css = [
		'bootstrap-chosen.css',
	];

	public $depends = [
		'yii\bootstrap\BootstrapAsset',
		'dkhlystov\widgets\assets\ChosenAsset',
	];

	public function init()
	{
		$this->sourcePath = __DIR__ . '/bootstrap-chosen';

		parent::init();
	}

}
