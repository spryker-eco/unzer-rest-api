<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi;

use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;
use SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientBridge;

/**
 * @method \SprykerEco\Glue\UnzerRestApi\UnzerRestApiConfig getConfig()
 */
class UnzerRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_UNZER = 'CLIENT_UNZER';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addUnzerClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addUnzerClient(Container $container): Container
    {
        $container->set(static::CLIENT_UNZER, function (Container $container) {
            return new UnzerRestApiToUnzerClientBridge($container->getLocator()->unzer()->client());
        });

        return $container;
    }
}
