<?php

namespace pelican\services;

use pelican\services\interfaces\ResponseList as IResponseList;
use pelican\services\interfaces\Result;

/**
 * Объект с ответом от сервиса со списком элементов
 */
class ResponseList extends Response implements IResponseList
{
	/**
	 * Задает список элементов, которые были возвращены для текущего запроса
	 * @param array $list
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setList(array $list)
	{
		foreach ($list as $key => $value) {
			//только те модели, которые следуют интерфейсу модели
			if (!($value instanceof Result))
				throw new \InvalidArgumentException('Wrong item class.');
		}
		$this->_data['list'] = array_values($list);
		return $this;
	}

	/**
	 * Возвращает список элементов, которые были возвращены для текущего запроса
	 * @return array
	 */
	public function getList()
	{
		return isset($this->_data['list']) && is_array($this->_data['list'])
			? $this->_data['list']
			: [];
	}



	/**
	 * Задает ограничение по количеству элементов для текущего списка
	 * @param int $limit
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setLimit($limit)
	{
		$this->_data['limit'] = (int) $limit;
		return $this;
	}

	/**
	 * Возвращает ограничение по количеству элементов для текущего списка
	 * @return int
	 */
	public function getLimit()
	{
		return isset($this->_data['limit']) ? $this->_data['limit'] : null;
	}



	/**
	 * Задает смещение для текущего списка
	 * @param int $offset
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setOffset($offset)
	{
		$this->_data['offset'] = (int) $offset;
		return $this;
	}

	/**
	 * Возвращает смещение для текущего списка
	 * @return int
	 */
	public function getOffset()
	{
		return isset($this->_data['offset']) ? $this->_data['offset'] : null;
	}



	/**
	 * Задает общее количество элементов по данному запросу
	 * @param int $total
	 * @return \pelican\services\interfaces\ResponseList
	 */
	public function setTotal($total)
	{
		$this->_data['total'] = (int) $total;
		return $this;
	}

	/**
	 * Возвращает общее количество элементов по данному запросу
	 * @return int
	 */
	public function getTotal()
	{
		return isset($this->_data['total']) ? $this->_data['total'] : null;
	}



	// Имплементация \Iterator
	/**
	 * @var int
	 */
	protected $position = 0;

	public function rewind()
	{
		$this->position = 0;
	}

	public function current()
	{
		$list = $this->getList();
		return $list[$this->position];
	}

	public function key()
	{
		return $this->position;
	}

	public function next()
	{
		++$this->position;
	}

	public function valid()
	{
		$list = $this->getList();
		return isset($list[$this->position]);
	}


	// Имплементация \ArrayAccess
	public function offsetExists($offset)
	{
		$list = $this->getList();
		return isset($list[$offset]);
	}

	public function offsetUnset($offset)
	{
		$list = $this->getList();
		unset($list[$offset]);
		$this->setList($list);
	}

	public function offsetGet($offset)
	{
		$list = $this->getList();
		return $list[$offset];
	}

	public function offsetSet($offset, $value)
	{
		if (!($value instanceof Result))
			throw new \InvalidArgumentException('Wrong item class.');
		$list = $this->getList();
		$list[$offset] = $value;
		$this->setList($list);
	}


	// Имплементация \Countable
	public function count()
	{
		$list = $this->getList();
		return count($list);
	}
}