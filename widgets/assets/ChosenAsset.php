<?php

namespace dkhlystov\widgets\assets;

use yii\web\AssetBundle;

class ChosenAsset extends AssetBundle
{

	public $sourcePath = '@bower/chosen';

	public $js = [
		'chosen.jquery.min.js',
	];

	public $css = [
		'chosen.min.css',
	];

	public $depends = [
		'yii\web\JqueryAsset',
	];

}
