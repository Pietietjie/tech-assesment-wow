<?php
declare(strict_types=1);
namespace Exercises\Denominator;

use Exception;

/**
* Given an amount and an array of denominations, return an array of denominations and numbers.
*
* @method static array getDenominations(int $amount, ?array &$denominations)
* For example,
* Denominator::getDenominations(200, [50 => 5]) returns [50 => 4]
* Denominator::getDenominations(300, [50 => 0, 100 => 6]) returns [100 => 3]
* Denominator::getDenominations(750, [50 => 1, 300 => 2, 100 => 1] returns [50 => 1, 300 => 2, 100 => 1]
*
*/
final class Denominator
{
    /**
     * Returns the denominators of the given amount based on the given denominators
     * @param int $amount
     * @param ?array $denominations
     * @throws Exception
     * @return array
     */
    public static function getDenominations(int $amount, ?array $denominations): array
    {
        if (!$denominations) {
            throw new Exception('Invalid Denominations array');
        }

        if ($amount < 0) {
            throw new Exception('Invalid Amount');
            return null;
        }

        $resultDenominations = [];

        krsort($denominations);

        foreach ($denominations as $denomination => $count)
        {
            if ($denomination <= 0 || $count < 0) {
                continue;
            }

            $maxDenominationForAmount = floor($amount / $denomination);

            if ($maxDenominationForAmount == 0) {
                continue;
            }

            if ($maxDenominationForAmount < $count) {
                $amount -= $maxDenominationForAmount * $denomination;
                $resultDenominations[$denomination] = $maxDenominationForAmount;
            } else {
                $amount -= $count * $denomination;
                $resultDenominations[$denomination] = $count;
            }
        }

        if ($amount > 0) {
            throw new Exception('There is insufficient Denominators for the amount given');
        }

        return $resultDenominations;
    }
}
