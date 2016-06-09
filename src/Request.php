<?php

namespace pelican\services;

use pelican\services\interfaces\Request as IRequest;

/**
 * Объект с запросом к сервису
 */
class Request implements IRequest
{
	/**
	 * Конструктор
	 * @param string $command
	 * @param array $params
	 */
	public function __construct($command, array $params = null)
	{
		$this->setCommand($command);
		if ($params) $this->setParams($params);
	}



	/**
	 * @var array
	 */
	protected $_params = [];

	/**
	 * Задает параметр запроса
	 * @param string $name
	 * @param mixed $value
	 * @return \pelican\services\interfaces\Request
	 */
	public function setParam($name, $value)
	{
		$this->_params[trim($name)] = $value;
		return $this;
	}

	/**
	 * Задает параметры запроса из массива
	 * @param array $params
	 * @return \pelican\services\interfaces\Request
	 */
	public function setParams(array $params)
	{
		foreach ($params as $name => $value) {
			$this->setParam($name, $value);
		}
		return $this;
	}

	/**
	 * Возвращает параметр запроса по имени
	 * @param string $name
	 * @return mixed
	 */
	public function getParam($name)
	{
		return isset($this->_params[$name]) ? $this->_params[$name] : null;
	}

	/**
	 * Возвращает список параметров запроса
	 * @return array
	 */
	public function getParams()
	{
		return $this->_params;
	}

	/**
	 * Очищает параметры запроса
	 * @return \pelican\services\interfaces\Request
	 */
	public function clearParams()
	{
		$this->_params = [];
		return $this;
	}



	/**
	 * @var string
	 */
	protected $_command = null;

	/**
	 * Задает название команды для сервиса
	 * @param string $command
	 * @return \pelican\services\interfaces\Request
	 */
	public function setCommand($command)
	{
		$this->_command = trim($command);
		return $this;
	}

	/**
	 * Возвращает название команды
	 * @return string
	 */
	public function getCommand()
	{
		return $this->_command;
	}
}