<?php

namespace App\Http\Controllers\Payments;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class WebhookController.
 */
class WebhookController extends \Laravel\Cashier\Http\Controllers\WebhookController
{
    public function handleInvoicePaymentSucceeded(array $payload)
    {

        return new Response();
    }
}
