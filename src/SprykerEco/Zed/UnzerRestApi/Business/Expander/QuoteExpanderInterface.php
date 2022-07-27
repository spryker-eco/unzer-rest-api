<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business\Expander;

use Generated\Shared\Transfer\RestCheckoutDataTransfer;

interface QuoteExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCheckoutDataTransfer $restCheckoutDataTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutDataTransfer
     */
    public function expandQuoteWithUnzerCredentials(RestCheckoutDataTransfer $restCheckoutDataTransfer): RestCheckoutDataTransfer;
}
