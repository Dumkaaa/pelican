<?php

namespace pelican\services\interfaces;

/**
 * Интерфейс для объекта с данными из ответа по запросу
 */
interface Result
{
	/**
	 * Возвращает список всех параметров записи
	 * @return array
	 */
	public function getAttributes();

	/**
	 * Возвращает параметр по его имени
	 * @param string $name
	 * @return array
	 */
	public function getAttribute($name);
}