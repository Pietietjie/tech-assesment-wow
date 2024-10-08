<?php
declare(strict_types=1);
namespace Exercises\Pyramid;
/**
* Print a pyramid.
*
* @method static void print(int $rows)
* @example Pyramid::print(3) -> '  #  '
*                               ' ### '
*                               '#####'
*/
final class Pyramid
{
    /**
     * Prints a pyramid/ziggurat with the amount of levels specified
     * @param int $rows the amount of levels to print for the pyramid
     * @return void
     */
    public static function print(int $rows, string $pyramidBlock = "#"): void
    {
        for ($i=0; $i < $rows; $i++) {
            $pyramidPadding = str_repeat(times: strlen($pyramidBlock) * ($rows - ($i + 1)), string: ' ');
            echo $pyramidPadding . str_repeat(times: 2 * $i + 1, string: $pyramidBlock) . $pyramidPadding . ($i + 1 < $rows ? "\r\n" : '');
        }
    }
}
