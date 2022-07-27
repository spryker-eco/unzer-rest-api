<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi;

use Spryker\Glue\Kernel\AbstractFactory;
use SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface;
use SprykerEco\Glue\UnzerRestApi\Processor\Mapper\RestCheckoutDataResponseAttributesMapper;
use SprykerEco\Glue\UnzerRestApi\Processor\Mapper\RestCheckoutDataResponseAttributesMapperInterface;
use SprykerEco\Glue\UnzerRestApi\Processor\Notification\UnzerNotificationProcessor;
use SprykerEco\Glue\UnzerRestApi\Processor\Notification\UnzerNotificationProcessorInterface;

/**
 * @method \SprykerEco\Glue\UnzerRestApi\UnzerRestApiConfig getConfig()
 */
class UnzerRestApiFactory extends AbstractFactory
{
    /**
     * @return \SprykerEco\Glue\UnzerRestApi\Processor\Notification\UnzerNotificationProcessorInterface
     */
    public function createUnzerNotificationProcessor(): UnzerNotificationProcessorInterface
    {
        return new UnzerNotificationProcessor(
            $this->getUnzerClient(),
        );
    }

    /**
     * @return \SprykerEco\Glue\UnzerRestApi\Processor\Mapper\RestCheckoutDataResponseAttributesMapperInterface
     */
    public function createRestCheckoutDataResponseAttributesMapper(): RestCheckoutDataResponseAttributesMapperInterface
    {
        return new RestCheckoutDataResponseAttributesMapper();
    }

    /**
     * @return \SprykerEco\Glue\UnzerRestApi\Dependency\UnzerRestApiToUnzerClientInterface
     */
    public function getUnzerClient(): UnzerRestApiToUnzerClientInterface
    {
        return $this->getProvidedDependency(UnzerRestApiDependencyProvider::CLIENT_UNZER);
    }
}
