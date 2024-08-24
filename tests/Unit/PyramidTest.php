<?php

namespace Tests\Unit;

use Exercises\Pyramid\Pyramid;
use PHPUnit\Framework\TestCase;

class PyramidTest extends TestCase
{
    /**
     * @outputBuffering disabled
     */
    public function test_prints_pyramid_with_no_levels(): void
    {
        Pyramid::print(0);
        $this->expectOutputString('');
    }

    /**
     * @outputBuffering disabled
     */
    public function test_prints_pyramid_with_one_level(): void
    {
        Pyramid::print(1);
        $this->expectOutputString('#');
    }

    /**
     * @outputBuffering disabled
     */
    public function test_prints_pyramid_with_ten_levels(): void
    {
        Pyramid::print(10);
        /**
         *          #
         *         ###
         *        #####
         *       #######
         *      #########
         *     ###########
         *    #############
         *   ###############
         *  #################
         * ###################
         */
        $this->expectOutputString( "         #         \r\n        ###        \r\n       #####       \r\n      #######      \r\n     #########     \r\n    ###########    \r\n   #############   \r\n  ###############  \r\n ################# \r\n###################");
    }
}
