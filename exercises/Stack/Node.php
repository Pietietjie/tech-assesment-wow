<?php
declare(strict_types=1);
namespace Exercises\Stack;

final class Node
{
    private ?Node $previous = null;

    public function __construct(
        private mixed $item
    )
    {}


    /**
     * Returns the Item for the current node
     * @return mixed
     */
    public function getItem(): mixed
    {
        return $this->item;
    }

    /**
     * Sets the reference for the Node before this Node
     * @param Node $previous
     * @return void
     */
    public function setPrevious(Node $previous): void
    {
        $this->previous = $previous;
    }

    /**
     * Returns the previous node in the stack
     * @return Node
     */
    public function getPrevious(): ?Node
    {
        return $this->previous;
    }
}
