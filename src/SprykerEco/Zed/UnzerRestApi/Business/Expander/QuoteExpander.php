<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business\Expander;

use Generated\Shared\Transfer\RestCheckoutDataTransfer;
use SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeInterface;

class QuoteExpander implements QuoteExpanderInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeInterface
     */
    protected UnzerRestApiToUnzerFacadeInterface $unzerFacade;

    /**
     * @param \SprykerEco\Zed\UnzerRestApi\Dependency\Facade\UnzerRestApiToUnzerFacadeInterface $unzerFacade
     */
    public function __construct(UnzerRestApiToUnzerFacadeInterface $unzerFacade)
    {
        $this->unzerFacade = $unzerFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCheckoutDataTransfer $restCheckoutDataTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutDataTransfer
     */
    public function expandQuoteWithUnzerCredentials(RestCheckoutDataTransfer $restCheckoutDataTransfer): RestCheckoutDataTransfer
    {
        $quoteTransfer = $this->unzerFacade
            ->expandQuoteWithUnzerCredentials(
                $restCheckoutDataTransfer->getQuoteOrFail(),
            );

        return $restCheckoutDataTransfer->setQuote($quoteTransfer);
    }
}
