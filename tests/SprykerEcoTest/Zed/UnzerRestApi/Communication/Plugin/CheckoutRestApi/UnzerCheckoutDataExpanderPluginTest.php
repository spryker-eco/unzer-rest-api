<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerRestApi\Business\UnzerRestApiFacade;

use Codeception\TestCase\Test;
use Generated\Shared\DataBuilder\RestCheckoutDataBuilder;
use Generated\Shared\DataBuilder\UnzerCredentialsBuilder;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use SprykerEco\Zed\UnzerRestApi\Communication\Plugin\CheckoutRestApi\UnzerCheckoutDataExpanderPlugin;

/**
 * Auto-generated group annotations
 *
 * @group SprykerEcoTest
 * @group Zed
 * @group UnzerRestApi
 * @group Business
 * @group UnzerRestApiFacade
 * Add your own group annotations below this line
 */
class UnzerCheckoutDataExpanderPluginTest extends Test
{
    /**
     * @return void
     */
    public function testExpandCheckoutDataShouldExpandWhileUnzerCredentialsAreSpecifiedWithinQuote(): void
    {
        // Arrange
        $unzerCredentailsTransfer = (new UnzerCredentialsBuilder())->withUnzerKeypair()->build();
        $restCheckoutDataTransfer = (new RestCheckoutDataBuilder())->withQuote([
            QuoteTransfer::UNZER_CREDENTIALS => $unzerCredentailsTransfer->toArray(),
        ])->build();
        $restCheckoutRequestAttributesTransfer = new RestCheckoutRequestAttributesTransfer();
        $unzerCheckoutDataExpanderPlugin = new UnzerCheckoutDataExpanderPlugin();

        // Act
        $restCheckoutDataTransfer = $unzerCheckoutDataExpanderPlugin->expandCheckoutData(
            $restCheckoutDataTransfer,
            $restCheckoutRequestAttributesTransfer,
        );

        // Assert
        $this->assertSame(
            $unzerCredentailsTransfer->getUnzerKeypair()->getPublicKey(),
            $restCheckoutDataTransfer->getQuote()->getUnzerCredentials()->getUnzerKeypair()->getPublicKey(),
        );
    }

    /**
     * @return void
     */
    public function testExpandCheckoutDataShouldNotExpandWhileUnzerCredentialsAreNotSpecifiedWithinQuote(): void
    {
        // Arrange
        $restCheckoutDataTransfer = (new RestCheckoutDataBuilder())->withQuote()->build();
        $restCheckoutRequestAttributesTransfer = new RestCheckoutRequestAttributesTransfer();
        $unzerCheckoutDataExpanderPlugin = new UnzerCheckoutDataExpanderPlugin();

        // Act
        $restCheckoutDataTransfer = $unzerCheckoutDataExpanderPlugin->expandCheckoutData(
            $restCheckoutDataTransfer,
            $restCheckoutRequestAttributesTransfer,
        );

        // Assert
        $this->assertNull($restCheckoutDataTransfer->getQuote()->getUnzerCredentials());
    }
}
