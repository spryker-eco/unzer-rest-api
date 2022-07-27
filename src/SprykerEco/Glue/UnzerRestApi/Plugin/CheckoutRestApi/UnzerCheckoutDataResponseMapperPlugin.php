<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Glue\UnzerRestApi\Plugin\CheckoutRestApi;

use Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCheckoutDataTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Glue\CheckoutRestApiExtension\Dependency\Plugin\CheckoutDataResponseMapperPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \SprykerEco\Glue\UnzerRestApi\UnzerRestApiFactory getFactory()
 */
class UnzerCheckoutDataResponseMapperPlugin extends AbstractPlugin implements CheckoutDataResponseMapperPluginInterface
{
    /**
     * {@inheritDoc}
     * - Requires `RestCheckoutDataTransfer.quote.unzerCredentials.unzerKeypair.publicKey` to be set while `RestCheckoutDataTransfer.quote.unzerCredentials` is specified.
     * - Maps `RestCheckoutDataTransfer.unzerCredentials.unzerKeypair.publicKey` to `RestCheckoutDataResponseAttributesTransfer.unzerPublicKey` while `RestCheckoutDataTransfer.unzerCredentials` is specified.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutDataTransfer $restCheckoutDataTransfer
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer $restCheckoutDataResponseAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer
     */
    public function mapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransfer(
        RestCheckoutDataTransfer $restCheckoutDataTransfer,
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        RestCheckoutDataResponseAttributesTransfer $restCheckoutDataResponseAttributesTransfer
    ): RestCheckoutDataResponseAttributesTransfer {
        return $this->getFactory()
            ->createRestCheckoutDataResponseAttributesMapper()
            ->mapRestCheckoutDataTransferToRestCheckoutDataResponseAttributesTransfer(
                $restCheckoutDataTransfer,
                $restCheckoutDataResponseAttributesTransfer,
            );
    }
}
