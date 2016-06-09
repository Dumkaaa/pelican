<?php

namespace pelican\services;

use pelican\services\interfaces\Response as IResponse;

/**
 * Объект с ответом от сервиса
 */
class Response implements IResponse
{
	/**
	 * @var mixed
	 */
	protected $_data = null;

	/**
	 * Задает данные ответа
	 * @param mixed $data
	 * @return \pelican\services\interfaces\Response
	 */
	public function setData($data)
	{
		$this->_data = $data;
	}

	/**
	 * Возвращает данные ответа
	 * @return mixed
	 */
	public function getData()
	{
		return $this->_data;
	}



	/**
	 * @var string
	 */
	protected $_error_code = null;

	/**
	 * Задает код ошибки
	 * @param string $code
	 * @return \pelican\services\interfaces\Response
	 */
	public function setErrorCode($code)
	{
		$this->_error_code = trim($code);
		return $this;
	}


	/**
	 * Возвращает код ошибки
	 * @return string
	 */
	public function getErrorCode()
	{
		return $this->_error_code;
	}



	/**
	 * @var string
	 */
	protected $_error_message = null;

	/**
	 * Задает сообщение об ошибке
	 * @param string $message
	 * @return \pelican\services\interfaces\Response
	 */
	public function setErrorMessage($message)
	{
		$this->_error_message = trim($message);
		return $this;
	}


	/**
	 * Возвращает сообщение об ошибке
	 * @return string
	 */
	public function getErrorMessage()
	{
		return $this->_error_message;
	}
}