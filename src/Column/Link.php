<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid\Column;


/**
 * Class Link
 * @package MteGrid\Grid\Column
 */
class Link extends AbstractColumn
{
    /**
     * @var array
     */
    protected $invokableMutators = [
        'link'
    ];
}