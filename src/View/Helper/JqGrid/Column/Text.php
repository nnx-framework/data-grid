<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\View\Helper\JqGrid\Column;

use Zend\View\Helper\AbstractHelper;
use Nnx\DataGrid\Column\ColumnInterface;
use Zend\View\Renderer\PhpRenderer;

/**
 * Class Column
 * @package Nnx\DataGrid\View\Helper
 */
class Text extends AbstractHelper
{
    /**
     * @param ColumnInterface $column
     * @return string
     */
    public function __invoke(ColumnInterface $column)
    {
        $config = $this->getColumnConfig($column);
        $config = array_merge($config, $column->getAttributes());
        return (object)$config;
    }

    /**
     * Возвращает конфигурацию колонки
     * @param ColumnInterface $column
     * @return array
     */
    protected function getColumnConfig(ColumnInterface $column)
    {
        /** @var PhpRenderer $view */
        $view = $this->getView();
        /** @var \Zend\View\Helper\EscapeHtml $escape */
        $escape = $view->plugin('escapeHtml');
        $name = $escape($column->getName());
        $header = $column->getHeader();
        $config = [
            'label' => $header ? $escape($header->getTitle()) : null,
            'index' => strtolower($name),
            'name' => strtolower($name),
        ];
        return $config;
    }

    protected function getAttrValue($key, $attributes, $default = null)
    {
        return array_key_exists($key, $attributes) ? $attributes[$key] : $default;
    }
}
