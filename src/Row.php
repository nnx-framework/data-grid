<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid;

use ArrayAccess;

/**
 * Class Row
 * @package Nnx\DataGrid
 */
class Row implements ArrayAccess
{
    /**
     * Данные строки
     * @var array|ArrayAccess
     */
    protected $data;

    /**
     * Опции строки
     * @var array
     */
    protected $options;

    /**
     * @param array|ArrayAccess $data
     * @param array $options
     */
    public function __construct($data, array $options = [])
    {
        $this->setData($data);
        $this->setOptions($options);
    }

    /**
     * @return array|ArrayAccess
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|ArrayAccess $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws Exception\InvalidArgumentException
     * @throws Exception\RuntimeException
     */
    public function get($name)
    {
        return $this->offsetGet($name);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @throws Exception\InvalidArgumentException
     * @throws Exception\RuntimeException
     */
    public function offsetGet($offset)
    {
        if (!$offset || !is_string($offset)) {
            throw new Exception\InvalidArgumentException('Некооректное имя столбца для получения из строки таблицы');
        }
        if (!array_key_exists($offset, $this->data)) {
            throw new Exception\RuntimeException(sprintf('Не найден столбец с именем %s в строке', $offset));
        }
        return $this->data[$offset];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
