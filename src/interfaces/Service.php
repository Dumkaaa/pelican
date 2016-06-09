<?php

namespace pelican\services\interfaces;

use pelican\services\interfaces\Request;
use pelican\services\interfaces\Response;
use pelican\services\interfaces\ResponseList;
use pelican\services\interfaces\ResponseItem;

/**
 * Интерфейс для объекта, инкапсулирующего работу
 * с удаленным сервисом REST или SOAP
 */
interface Service
{
	/**
	 * Функция, которая конфигурирует сервис
	 * @param array $options массив, в котором ключи - название опций, значения - значения опций
	 * @return \pelican\services\interfaces\Service
	 */
	public function setOptions(array $options);

	/**
	 * Функция, которая возвращает массив всех опций сервиса
	 * @return array
	 */
	public function getOptions();

	/**
	 * Функция, которая задает значение опции по ее названию
	 * @param string $name
	 * @param mixed $value
	 * @return \pelican\services\interfaces\Service
	 */
	public function setOption($name, $value);

	/**
	 * Функция, которая возвращает значение опции по ее названию
	 * @param string $name
	 * @return mixed
	 */
	public function getOption($name);

	/**
	 * Выполняет запрос из объекта Request
	 * и заносит все данные в объект Response
	 * @param \pelican\services\interfaces\Request $request
	 * @param \pelican\services\interfaces\Response $response
	 */
	public function query(Request $request, Response $response);

	/**
	 * Выполняет запрос, который должен вернуть список из нескольких элементов
	 * @param \pelican\services\interfaces\Request $request
	 * @param \pelican\services\interfaces\ResponseList $response
	 */
	public function queryAll(Request $request, ResponseList $response);

	/**
	 * Выполняет запрос, который должен вернуть толкьо один элемент
	 * @param \pelican\services\interfaces\Request $request
	 * @param \pelican\services\interfaces\ResponseItem $response
	 */
	public function queryOne(Request $request, ResponseItem $response);
}