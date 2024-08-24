<?php
declare(strict_types=1);

namespace Exercises\Vowels;
/**
 * Count string vowels (aeiou).
 *
 * @method static int count(string $string)
 * @example Vowels::count('Hello!') === 2
 * @example Vowels::count('Why?') === 0
 */
final class Vowels
{
    const VOWELS = 'aeiou';
    public static function count(string $string):int
    {
        $count = 0;
        foreach (str_split(strtolower($string)) as $char) {
            if (str_contains(needle: $char, haystack: self::VOWELS)) {
                $count++;
            }
        }

        return $count;
    }
}
