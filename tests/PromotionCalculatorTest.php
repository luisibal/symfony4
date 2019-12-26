<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Services\PromotionCalculator;

class PromotionCalculatorTest extends TestCase
{
    public function testSomething()
    {
        $calculator = $this->getMockBuilder(PromotionCalculator::class)
            ->setMethods(['getPromotionPercentage'])->getMock();

        //mock version of getPromotionPercentage is expected
        // to return the value of 20 (real method is not tested, only calculatePriceAfterPromotion)
        $calculator->expects($this->any())->method('getPromotionPercentage')->willReturn(20);

        $result = $calculator->calculatePriceAfterPromotion(1, 9);
        //10-20%10{2} = 8
        $this->assertEquals(8, $result);

        $result = $calculator->calculatePriceAfterPromotion(10, 20, 50);
        //= 64
        $this->assertEquals(64, $result);
    }
}
