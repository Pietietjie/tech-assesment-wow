<?php
declare(strict_types=1);
namespace Exercises\Stack;
/**
 * Create a Stack.
 *
 * When stack is empty remove and peek methods should return null.
 *
 * @property mixed[] $stack
 * @method void add(mixed $value)
 * @method mixed|null pop() - returns the last element of the stack and removes it from the stack.
 * @method mixed|null peek() - returns the last element of the stack and does not remove it from the stack.
 * @method static self zip(self $stack1, self $stack2) interweaves two provided stacks
 * @example $stack1 = new Stack();
 * $stack1->add(1);
 * $stack1->add(2);
 * $stack1->add(3);
 * $stack1->peek() === 3;
 * $stack1->remove() === 3;
 *
 * $stack2 = new Stack();
 *
 * $stack2->add('a');
 * $stack2->add('b');
 * $stack2->add('c');
 *
 * Stack::zip(stack1, stack2) -> [1, 'a', 2, 'b', 'c']
 */
final class Stack
{
    private ?Node $top = null;
    public int $length = 0;

    public function add(mixed $value): void
    {
        if ($this->top == null) {
            $this->top = new Node($value);
        } else {
            $node = new Node($value);
            $node->setPrevious($this->top);
            $this->top = $node;
        }
        $this->length++;
    }

    public function peek(): mixed
    {
        if ($this->top == null) {
            return null;
        }
        return $this->top->getItem();
    }

    public function pop(): mixed
    {
        if ($this->top == null) {
            return null;
        }
        $previousValue = $this->top->getItem();
        $this->top = $this->top->getPrevious();
        $this->length--;
        return $previousValue;
    }

    public function toArray(): array
    {
        $clonedStack = clone $this;
        $result = [];

        while ($clonedStack->length > 0) {
            $result[] = $clonedStack->pop();
        }
        return $result;
    }

    public static function zip(Stack ...$stacks): Stack
    {
        $zippedStack = new Stack;
        $tempStacks = [];
        foreach ($stacks as $i => $stack) {
            $tempStacks[$i] = $stack->toArray();
        }
        $stacks = $tempStacks;

        while (count($stacks) > 0) {
            foreach ($stacks as $i => $stack) {
                if (empty($stack)) {
                    unset($stacks[$i]);
                    continue;
                }
                $zippedStack->add(array_pop($stacks[$i]));
            }
        }
        return $zippedStack;
    }
}
