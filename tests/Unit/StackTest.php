<?php

namespace Tests\Unit;

use Exercises\Stack\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function test_stack_empty()
    {
        $stack = new Stack;
        $this->assertEquals(expected: null, actual: $stack->peek());
        $this->assertEquals(expected: null, actual: $stack->pop());
        $this->assertEquals(expected: 0, actual: $stack->length);
    }

    public function test_stack_add_single_item()
    {
        $stack = new Stack;
        $stack->add(':)');
        $this->assertEquals(expected: 1, actual: $stack->length);
        $this->assertEquals(expected: ':)', actual: $stack->peek());
        $this->assertEquals(expected: ':)', actual: $stack->pop());

        $this->assertEquals(expected: 0, actual: $stack->length);
    }

    public function test_stack_add_multiple_items()
    {
        $stack = new Stack;
        $stack->add(':)');
        $stack->add(':|');
        $stack->add(':(');
        $this->assertEquals(expected: 3, actual: $stack->length);
        $this->assertEquals(expected: ':(', actual: $stack->peek());
        $this->assertEquals(expected: ':(', actual: $stack->pop());

        $this->assertEquals(expected: 2, actual: $stack->length);
        $this->assertEquals(expected: ':|', actual: $stack->peek());
        $this->assertEquals(expected: ':|', actual: $stack->pop());

        $this->assertEquals(expected: 1, actual: $stack->length);
        $this->assertEquals(expected: ':)', actual: $stack->peek());
        $this->assertEquals(expected: ':)', actual: $stack->pop());

        $this->assertEquals(expected: 0, actual: $stack->length);
    }

    public function test_stack_zip_two_stacks_together()
    {
        $stack = new Stack;
        $stack->add(':)');
        $stack->add(':|');
        $stack->add(':(');

        $stackTheSecond = new Stack;
        $stackTheSecond->add(0);
        $stackTheSecond->add(10);

        $stackTheZipped = Stack::zip($stack, $stackTheSecond);

        $this->assertEquals(expected: 3, actual: $stack->length);
        $this->assertEquals(expected: 2, actual: $stackTheSecond->length);

        $this->assertEquals(expected: 5, actual: $stackTheZipped->length);
        $this->assertEquals(expected: ':(', actual: $stackTheZipped->peek());
        $this->assertEquals(expected: ':(', actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 4, actual: $stackTheZipped->length);
        $this->assertEquals(expected: 10, actual: $stackTheZipped->peek());
        $this->assertEquals(expected: 10, actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 3, actual: $stackTheZipped->length);
        $this->assertEquals(expected: ':|', actual: $stackTheZipped->peek());
        $this->assertEquals(expected: ':|', actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 2, actual: $stackTheZipped->length);
        $this->assertEquals(expected: 0, actual: $stackTheZipped->peek());
        $this->assertEquals(expected: 0, actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 1, actual: $stackTheZipped->length);
        $this->assertEquals(expected: ':)', actual: $stackTheZipped->peek());
        $this->assertEquals(expected: ':)', actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 0, actual: $stackTheZipped->length);
    }

    public function test_stack_zip_with_three_stacks()
    {
        $stack = new Stack;
        $stack->add(':)');

        $stackTheSecond = new Stack;
        $stackTheSecond->add(0);

        $stackTheThird = new Stack;
        $stackTheThird->add(false);

        $stackTheZipped = Stack::zip($stack, $stackTheSecond, $stackTheThird);

        $this->assertEquals(expected: 1, actual: $stack->length);
        $this->assertEquals(expected: 1, actual: $stackTheSecond->length);
        $this->assertEquals(expected: 1, actual: $stackTheThird->length);

        $this->assertEquals(expected: 3, actual: $stackTheZipped->length);
        $this->assertEquals(expected: false, actual: $stackTheZipped->peek());
        $this->assertEquals(expected: false, actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 2, actual: $stackTheZipped->length);
        $this->assertEquals(expected: 0, actual: $stackTheZipped->peek());
        $this->assertEquals(expected: 0, actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 1, actual: $stackTheZipped->length);
        $this->assertEquals(expected: ':)', actual: $stackTheZipped->peek());
        $this->assertEquals(expected: ':)', actual: $stackTheZipped->pop());

        $this->assertEquals(expected: 0, actual: $stackTheZipped->length);
    }
}
