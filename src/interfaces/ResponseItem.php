<?php

namespace pelican\services\interfaces;

use pelican\services\interfaces\Result;

/**
 * Интерфейс для объекта с ответом от сервиса, 
 * в котором ожидается только один элемент
 */
interface ResponseItem extends Response
{
	/**
	 * Задает элемент для ответа
	 * @param Result $item
	 * @return \pelican\services\interfaces\ResponseItem
	 */
	public function setItem(Result $item);

	/**
	 * Возвращает элемент для ответа
	 * @return \pelican\services\interfaces\Result
	 */
	public function getItem();
}