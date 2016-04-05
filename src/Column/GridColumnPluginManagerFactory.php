<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\Column;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class ColumnPluginManagerFactory
 * @package Nnx\DataGrid\Column
 */
class GridColumnPluginManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = GridColumnPluginManager::class;
}
