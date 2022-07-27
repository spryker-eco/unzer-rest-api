<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeBridge;

/**
 * @method \SprykerEco\Zed\UnzerRestApi\UnzerRestApiConfig getConfig()
 */
class UnzerRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_UNZER = 'FACADE_UNZER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addUnzerFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUnzerFacade(Container $container): Container
    {
        $container->set(static::FACADE_UNZER, function (Container $container) {
            return new UnzerRestApiToUnzerFacadeBridge($container->getLocator()->unzer()->facade());
        });

        return $container;
    }
}
