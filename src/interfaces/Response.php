<?php

namespace pelican\services\interfaces;

/**
 * Интерфейс для объекта с ответом от сервиса
 */
interface Response
{
	/**
	 * Задает данные ответа
	 * @param mixed $data
	 * @return \pelican\services\interfaces\Response
	 */
	public function setData($data);

	/**
	 * Возвращает данные ответа
	 * @return mixed
	 */
	public function getData();

	/**
	 * Задает код ошибки
	 * @param string $code
	 * @return \pelican\services\interfaces\Response
	 */
	public function setErrorCode($code);

	/**
	 * Возвращает код ошибки
	 * @return string
	 */
	public function getErrorCode();

	/**
	 * Задает сообщение об ошибке
	 * @param string $message
	 * @return \pelican\services\interfaces\Response
	 */
	public function setErrorMessage($message);

	/**
	 * Возвращает сообщение об ошибке
	 * @return string
	 */
	public function getErrorMessage();
}