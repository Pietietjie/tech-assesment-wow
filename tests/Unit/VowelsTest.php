<?php

namespace Tests\Unit;

use Exercises\Vowels\Vowels;
use PHPUnit\Framework\TestCase;

class VowelsTest extends TestCase
{
    public function test_empty_string(): void
    {
        $this->assertEquals(expected: 0, actual: Vowels::count(''));
    }

    public function test_string_is_a_vowel_char(): void
    {
        $this->assertEquals(expected: 1, actual: Vowels::count('a'));
    }

    public function test_string_is_a_consonant_char(): void
    {
        $this->assertEquals(expected: 0, actual: Vowels::count('l'));
    }

    public function test_string_with_no_vowels(): void
    {
        $this->assertEquals(expected: 0, actual: Vowels::count('Why?'));
    }

    public function test_string_with_multiple_vowels(): void
    {
        $this->assertEquals(expected: 2, actual: Vowels::count('Hello!'));
    }

    public function test_string_is_a_vowel_char_capitalized(): void
    {
        $this->assertEquals(expected: 1, actual: Vowels::count('A'));
    }

    public function test_string_is_a_consonant_char_capitalized(): void
    {
        $this->assertEquals(expected: 0, actual: Vowels::count('L'));
    }

    public function test_string_with_no_vowels_capitalized(): void
    {
        $this->assertEquals(expected: 0, actual: Vowels::count('WHY?'));
    }

    public function test_string_with_multiple_vowels_capitalized(): void
    {
        $this->assertEquals(expected: 2, actual: Vowels::count('HELLO!'));
    }
}
