<?php
declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use Exercises\Denominator\Denominator;
use Exercises\Json\Json;
use Exercises\Pyramid\Pyramid;
use Exercises\Queue\Queue;
use Exercises\Stack\Stack;
use Exercises\Vowels\Vowels;

echo "1. Loop through the following JSON data and print out the data.\r\n\r\n";
Json::printFromFile(path: __DIR__.'/storage/test_1.json');
echo "\r\n";
echo "\r\n";

echo "2. Write a function that counts the vowels in a string\r\n\r\n";
echo "Running Vowels::count('Hello!') => " . Vowels::count('Hello!') . "\r\n";
echo "Running Vowels::count('Why?') => " . Vowels::count('Why?') . "\r\n\r\n";

echo "3. Print a pyramid\r\n\r\n";
echo "For Pyramid::print(3)\r\n";
echo Pyramid::print(3) . "\r\n";
echo "For Pyramid::print(10)\r\n";
echo Pyramid::print(10) . "\r\n";
echo "\r\n";

echo "4. Create a queue\r\n\r\n";
$queue1 = new Queue();
echo "Running \$queue1->add(1)\r\n";
$queue1->add(1);
echo "Running \$queue1->add(2)\r\n";
$queue1->add(2);
echo "Running \$queue1->add(3)\r\n";
$queue1->add(3);
echo "Running \$queue1->peek() => {$queue1->peek()}\r\n";
echo "Running \$queue1->remove() => {$queue1->remove()}\r\n";

$queue2 = new Queue();

echo "Running \$queue2->add('a')\r\n";
$queue2->add('a');
echo "Running \$queue2->add('b')\r\n";
$queue2->add('b');
echo "Running \$queue2->add('c')\r\n";
$queue2->add('c');

echo "Running Queue::zip(\$queue1, \$queue2) =>\r\n";
print_r(Queue::zip($queue1, $queue2)->toArray());

echo "\r\n";
echo "\r\n";

$stack1 = new Stack();
echo "Running \$stack1->add(1)\r\n";
$stack1->add(1);
echo "Running \$stack1->add(2)\r\n";
$stack1->add(2);
echo "Running \$stack1->add(3)\r\n";
$stack1->add(3);
echo "Running \$stack1->peek() => {$stack1->peek()}\r\n";
echo "Running \$stack1->pop() => {$stack1->pop()}\r\n";

$stack2 = new Stack();

echo "Running \$stack2->add('a')\r\n";
$stack2->add('a');
echo "Running \$stack2->add('b')\r\n";
$stack2->add('b');
echo "Running \$stack2->add('c')\r\n";
$stack2->add('c');

echo "Running Stack::zip(\$stack1, \$stack2) =>\r\n";
print_r(Stack::zip($stack1, $stack2)->toArray());
echo "\r\n";

echo "5. Denomination maker\r\n\r\n";
echo "Running Denominator::getDenominations(200, [50 => 5]): =>\r\n";
print_r(Denominator::getDenominations(200, [50 => 5]));
echo "Running Denominator::getDenominations(300, [50 => 0, 100 => 6]): =>\r\n";
print_r(Denominator::getDenominations(300, [50 => 0, 100 => 6]));
echo "Running Denominator::getDenominations(750, [50 => 1, 300 => 2, 100 => 1]): =>\r\n";
print_r(Denominator::getDenominations(750, [50 => 1, 300 => 2, 100 => 1]));
