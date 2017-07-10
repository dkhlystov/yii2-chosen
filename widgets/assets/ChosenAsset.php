<?php

namespace dkhlystov\widgets\assets;

use yii\web\AssetBundle;

class ChosenAsset extends AssetBundle
{

	public $sourcePath = '@bower/chosen';

	public $js = [
		'chosen.jquery.js',
	];

	public $css = [
		'chosen.css',
	];

	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset',
	];

}
