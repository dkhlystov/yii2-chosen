<?php

namespace dkhlystov\widgets\assets;

use yii\web\AssetBundle;

class BootstrapChosenAsset extends AssetBundle
{

	public $sourcePath = '@bower/bootstrap-chosen';

	public $css = [
		'bootstrap-chosen.css',
	];

	public $depends = [
		'yii\bootstrap\BootstrapAsset',
		'dkhlystov\widgets\assets\ChosenAsset',
	];

}
