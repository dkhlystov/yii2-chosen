<?php

namespace dkhlystov\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

use dkhlystov\widgets\assets\BootstrapChosenAsset;

class Chosen extends InputWidget
{

	/**
	 * @var boolean whether to render input as multiple select
	 */
	public $multiple = false;

	/**
	 * @var array items array to render select options
	 */
	public $items = [];

	/**
	 * @inheritdoc
	 */
	public $options = ['class' => 'form-control'];

	/**
	 * @var array additional options for jquery bootstrap chosen widget
	 */
	public $clientOptions = ['width' => '100%'];

	/**
	 * @var string placeholder for chosen
	 */
	public $placeholder;

	/**
	 * @var string no result text for chosen
	 */
	public $noResultText;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

		if ($this->multiple)
			$this->options['multiple'] = true;

		if ($this->placeholder !== null)
			$this->options['data-placeholder'] = $this->placeholder;

		if ($this->noResultText !== null)
			$this->clientOptions['no_results_text'] = $this->noResultText;

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
