<?php

namespace pelican\services;

use pelican\services\interfaces\ResponseItem as IResponseItem;
use pelican\services\interfaces\Result;

/**
 * Объект с ответом от сервиса со списком элементов
 */
class ResponseItem extends Response implements IResponseItem
{
	/**
	 * Задает элемент для ответа
	 * @param Result $item
	 * @return \pelican\services\interfaces\ResponseItem
	 */
	public function setItem(Result $item)
	{
		$this->_data['item'] = $item;
	}

	/**
	 * Возвращает элемент для ответа
	 * @return \pelican\services\interfaces\Result
	 */
	public function getItem()
	{
		return isset($this->_data['item']) && $this->_data['item'] instanceof Result
			? $this->_data['item']
			: null;
	}
}