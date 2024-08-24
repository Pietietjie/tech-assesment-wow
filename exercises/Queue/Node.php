<?php
declare(strict_types=1);
namespace Exercises\Queue;

final class Node
{
    private ?Node $next = null;

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
     * Sets the reference for the Node after this Node
     * @param Node $next
     * @return void
     */
    public function setNext(Node $next): void
    {
        $this->next = $next;
    }

    /**
     * Gets the Node added after this Node to the Queue
     * @return Node
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }
}
