<?php

namespace pelican\services\interfaces;

/**
 * Интерфейс для объекта с запросом к сервису
 */
interface Request
{
	/**
	 * Конструктор
	 * @param string $command
	 * @param array $params
	 */
	public function __construct($command, array $params = null);

	/**
	 * Задает параметр запроса
	 * @param string $name
	 * @param mixed $value
	 * @return \pelican\services\interfaces\Request
	 */
	public function setParam($name, $value);

	/**
	 * Задает параметры запроса из массива
	 * @param array $params
	 * @return \pelican\services\interfaces\Request
	 */
	public function setParams(array $params);

	/**
	 * Возвращает параметр запроса по имени
	 * @param string $name
	 * @return mixed
	 */
	public function getParam($name);

	/**
	 * Возвращает список параметров запроса
	 * @return array
	 */
	public function getParams();

	/**
	 * Очищает параметры запроса
	 * @return \pelican\services\interfaces\Request
	 */
	public function clearParams();

	/**
	 * Задает название команды для сервиса
	 * @param string $command
	 * @return \pelican\services\interfaces\Request
	 */
	public function setCommand($command);

	/**
	 * Возвращает название команды
	 * @return string
	 */
	public function getCommand();
}