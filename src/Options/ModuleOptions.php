<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Class ModuleOptions 
 * @package MteGrid\Grid\Options
 */
class ModuleOptions extends AbstractOptions
{
    /**
     * Массив настроек таблиц
     * @var array
     */
    protected $grids;

    /**
     * @var string
     */
    protected $doctrineEntityManager;

    /**
     * Возвращает массив настроек таблиц
     * @return array
     */
    public function getGrids()
    {
        return $this->grids;
    }

    /**
     * Устанавливает настроики таблиц
     * @param array $grids
     * @return $this
     */
    public function setGrids($grids)
    {
        $this->grids = $grids;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoctrineEntityManager()
    {
        return $this->doctrineEntityManager;
    }

    /**
     * @param string $doctrineEntityManager
     * @return $this
     */
    public function setDoctrineEntityManager($doctrineEntityManager)
    {
        $this->doctrineEntityManager = $doctrineEntityManager;
        return $this;
    }
}
