<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Glue\UnzerRestApi\Plugin\CheckoutRestApi;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\RestCheckoutDataBuilder;
use Generated\Shared\DataBuilder\UnzerCredentialsBuilder;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutDataResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use SprykerEco\Glue\UnzerRestApi\Plugin\CheckoutRestApi\UnzerCheckoutDataResponseMapperPlugin;

/**
 * Auto-generated group annotations
 *
 * @group SprykerEcoTest
 * @group Glue
 * @group UnzerRestApi
 * @group Plugin
 * @group CheckoutRestApi
 * @group UnzerCheckoutDataResponseMapperPluginTest
 * Add your own group annotations below this line
 */
class UnzerCheckoutDataResponseMapperPluginTest extends Unit
{
    /**
     * @return void
     */
    public function testMapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransferShouldMapPublicKeyWhileUnzerCredentialsSpecified(): void
    {
        // Arrange
        $unzerCredentailsTransfer = (new UnzerCredentialsBuilder())->withUnzerKeypair()->build();
        $restCheckoutDataTransfer = (new RestCheckoutDataBuilder())->withQuote([
            QuoteTransfer::UNZER_CREDENTIALS => $unzerCredentailsTransfer->toArray(),
        ])->build();
        $restCheckoutRequestAttributesTransfer = new RestCheckoutRequestAttributesTransfer();
        $restCheckoutDataResponseAttributesTransfer = new RestCheckoutDataResponseAttributesTransfer();
        $unzerCheckoutDataResponseMapperPlugin = new UnzerCheckoutDataResponseMapperPlugin();

        // Act
        $restCheckoutDataResponseAttributesTransfer = $unzerCheckoutDataResponseMapperPlugin->mapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransfer(
            $restCheckoutDataTransfer,
            $restCheckoutRequestAttributesTransfer,
            $restCheckoutDataResponseAttributesTransfer,
        );

        // Assert
        $this->assertSame(
            $unzerCredentailsTransfer->getUnzerKeypair()->getPublicKey(),
            $restCheckoutDataResponseAttributesTransfer->getUnzerPublicKey(),
        );
    }

    /**
     * @return void
     */
    public function testMapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransferShouldNotMapPublicKeyWhileUnzerCredentialsUnspecified(): void
    {
        // Arrange
        $restCheckoutDataTransfer = (new RestCheckoutDataBuilder())->withQuote()->build();
        $restCheckoutRequestAttributesTransfer = new RestCheckoutRequestAttributesTransfer();
        $restCheckoutDataResponseAttributesTransfer = new RestCheckoutDataResponseAttributesTransfer();
        $unzerCheckoutDataResponseMapperPlugin = new UnzerCheckoutDataResponseMapperPlugin();

        // Act
        $restCheckoutDataResponseAttributesTransfer = $unzerCheckoutDataResponseMapperPlugin->mapRestCheckoutDataResponseTransferToRestCheckoutDataResponseAttributesTransfer(
            $restCheckoutDataTransfer,
            $restCheckoutRequestAttributesTransfer,
            $restCheckoutDataResponseAttributesTransfer,
        );

        // Assert
        $this->assertNull($restCheckoutDataResponseAttributesTransfer->getUnzerPublicKey());
    }
}
