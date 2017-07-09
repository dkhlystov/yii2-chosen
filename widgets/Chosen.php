<?php

namespace dkhlystov\widgets;

use yii\widgets\InputWidget;

class Chosen extends InputWidget
{

	/**
	 * @var array options for Chosen plugin
	 * @see http://harvesthq.github.io/chosen/options.html
	 */
	public $clientOptions = [];

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

		$this->registerScripts();
	}

	/**
	 * Register client scripts
	 * @return void
	 */
	private function registerScripts()
	{
		ChosenAsset::register($this->getView());

		$clientOptions = Json::encode($this->clientOptions);
		$id = $this->options['id'];
		$this->getView()->registerJs("jQuery('#$id').chosen({$clientOptions});");
	}

}
