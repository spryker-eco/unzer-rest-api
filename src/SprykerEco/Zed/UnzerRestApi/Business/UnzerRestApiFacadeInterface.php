<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerRestApi\Business;

use Generated\Shared\Transfer\RestCheckoutDataTransfer;

interface UnzerRestApiFacadeInterface
{
    /**
     * Specification:
     * - Requires `QuoteTransfer.store.name` transfer property to be set.
     * - Expands `QuoteTransfer` with `UnzerCredentialsTransfer` according to added items.
     * - Does nothing if quote has no items.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutDataTransfer $restCheckoutDataTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutDataTransfer
     */
    public function expandCheckoutData(RestCheckoutDataTransfer $restCheckoutDataTransfer): RestCheckoutDataTransfer;
}
