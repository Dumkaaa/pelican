<?php

namespace pelican\services\interfaces;

/**
 * Интерфейс для объекта с ответом от сервиса, 
 * в котором ожидается список элементов
 */
interface ResponseList extends Response, \Iterator, \ArrayAccess, \Countable
{
	/**
	 * Задает список элементов, которые были возвращены для текущего запроса
	 * @param array $list
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setList(array $list);

	/**
	 * Возвращает список элементов, которые были возвращены для текущего запроса
	 * @return array
	 */
	public function getList();

	/**
	 * Задает ограничение по количеству элементов для текущего списка
	 * @param int $limit
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setLimit($limit);

	/**
	 * Возвращает ограничение по количеству элементов для текущего списка
	 * @return int
	 */
	public function getLimit();

	/**
	 * Задает смещение для текущего списка
	 * @param int $offset
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setOffset($offset);

	/**
	 * Возвращает смещение для текущего списка
	 * @return int
	 */
	public function getOffset();

	/**
	 * Задает общее количество элементов по данному запросу
	 * @param int $total
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setTotal($total);

	/**
	 * Возвращает общее количество элементов по данному запросу
	 * @return int
	 */
	public function getTotal();
}