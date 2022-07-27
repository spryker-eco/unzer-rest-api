<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business;

use Generated\Shared\Transfer\RestCheckoutDataTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerEco\Zed\UnzerRestApi\Business\UnzerRestApiBusinessFactory getFactory()
 */
class UnzerRestApiFacade extends AbstractFacade implements UnzerRestApiFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutDataTransfer $restCheckoutDataTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutDataTransfer
     */
    public function expandCheckoutData(RestCheckoutDataTransfer $restCheckoutDataTransfer): RestCheckoutDataTransfer
    {
        return $this->getFactory()
            ->createQuoteExpander()
            ->expandQuoteWithUnzerCredentials($restCheckoutDataTransfer);
    }
}
