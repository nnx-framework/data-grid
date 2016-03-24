<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid\Mutator;

use MteGrid\Grid\FactoryInterface;
use Traversable;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Factory
 * @package MteGrid\Grid\Mutator
 */
class Factory implements FactoryInterface, ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * Конструктор класса
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->setServiceLocator($serviceLocator);
    }

    /**
     * Валидирует пришедшие данные для создания мутатора
     * @param array $spec
     * @throws Exception\RuntimeException
     */
    protected function validate($spec)
    {
        if (!array_key_exists('type', $spec) || !$spec['type']) {
            throw new Exception\RuntimeException('Для создания мутатора должен быть задан его тип');
        }
    }

    /**
     * Создает экземпляр объекта
     * @param array | Traversable | string $spec
     * @return mixed
     */
    public function create($spec)
    {
        $this->validate($spec);

        /** @var GridMutatorPluginManager $mutatorManager */
        $mutatorManager = $this->getServiceLocator()->get('GridMutatorManager');
        $options = [];
        if (array_key_exists('options', $spec) && $spec['options']) {
            $options = $spec['options'];
        }
        $mutator = $mutatorManager->get($spec['type'], $options);
        return $mutator;
    }

}