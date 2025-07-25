<?php

declare(strict_types=1);

namespace App\Enums;


use Shopper\Core\Traits\HasEnumStaticMethods;

/**
 * @method static string Stripe()
 * @method static string NotchPay()
 * @method  static string SwiftTransfer()
 * @method static string Cash()
 */
enum PaymentType: string
{
    use HasEnumStaticMethods;

    case Stripe = 'stripe';

    case NotchPay = 'notch-pay';

    case SwiftTransfer = 'swift-transfer';

    case Cash = 'cash';
}
