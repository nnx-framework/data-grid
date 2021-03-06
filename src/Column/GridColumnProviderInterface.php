<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\Column;

use Traversable;

/**
 * Interface GridColumnProviderInterface
 * @package Nnx\DataGrid\Column
 */
interface GridColumnProviderInterface
{
    /**
     * Возвращает конфигурацию колонок
     * @return array | Traversable
     */
    public function getGridColumnConfig();
}
