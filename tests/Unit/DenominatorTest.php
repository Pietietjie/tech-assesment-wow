<?php

namespace Tests\Unit;

use Exercises\Denominator\Denominator;
use PHPUnit\Framework\TestCase;

class DenominatorTest extends TestCase
{
    public function test_with_null_denominator(): void
    {
        $this->expectExceptionMessage('Invalid Denominations array');
        Denominator::getDenominations(30, null);
    }

    public function test_with_empty_denominator(): void
    {
        $this->expectExceptionMessage('Invalid Denominations array');
        Denominator::getDenominations(30, []);
    }

    public function test_with_invalid_amount(): void
    {
        $this->expectExceptionMessage('Invalid Amount');
        Denominator::getDenominations(-30, [6 => 5]);
    }

    public function test_with_zero_amount(): void
    {
        $this->assertEquals(expected: [], actual: Denominator::getDenominations(0, [6 => 5]));
    }

    public function test_with_single_denominator(): void
    {
        $this->assertEquals(expected: [6 => 5], actual: Denominator::getDenominations(30, [6 => 5]));
    }

    public function test_with_single_denominator_high_count(): void
    {
        $this->assertEquals(expected: [6 => 5], actual: Denominator::getDenominations(30, [6 => 50]));
    }

    public function test_with_single_denominator_low_count(): void
    {
        $this->expectExceptionMessage('There is insufficient Denominators for the amount given');
        Denominator::getDenominations(30, [6 => 1]);
    }

    public function test_with_single_denominator_multiple_denominators(): void
    {
        $this->assertEquals(expected: [50 => 1, 300 => 2, 100 => 1], actual: Denominator::getDenominations(750, [50 => 1, 300 => 2, 100 => 1]));
    }

    public function test_with_single_denominator_multiple_denominators_high_count(): void
    {
        $this->assertEquals(expected: [50 => 1, 300 => 2, 100 => 1], actual: Denominator::getDenominations(750, [50 => 4, 300 => 5, 100 => 5]));
        $this->assertEquals(expected: [50 => 1, 300 => 1, 100 => 4], actual: Denominator::getDenominations(750, [50 => 4, 300 => 1, 100 => 5]));
    }

    public function test_with_single_denominator_multiple_denominators_low_count(): void
    {
        $this->expectExceptionMessage('There is insufficient Denominators for the amount given');
        Denominator::getDenominations(750, [50 => 1, 300 => 1, 100 => 1]);
    }
}
