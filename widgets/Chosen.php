<?php

namespace dkhlystov\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

use dkhlystov\widgets\assets\BootstrapChosenAsset;

class Chosen extends InputWidget
{

	public $multiple = false;

	public $items = [];

	/**
	 * @inheritdoc
	 */
	public $options = ['class' => 'form-control'];

	/**
	 * @var array additional options for jquery bootstrap chosen widget
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
	 * @inheritdoc
	 */
	public function run()
	{
		if ($this->hasModel()) {
			if ($this->multiple) {
				echo Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
			} else {
				echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
			}
		} else {
			if ($this->multiple) {
				echo Html::listBox($this->name, $this->value, $this->items, $this->options);
			} else {
				echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
			}
		}
	}

	/**
	 * Register client scripts
	 * @return void
	 */
	private function registerScripts()
	{
		$view = $this->getView();

		BootstrapChosenAsset::register($view);

		$options = Json::htmlEncode($this->clientOptions);

		$view->registerJs("jQuery('#{$this->options['id']}').chosen($.extend({}, $options));");
	}

}
