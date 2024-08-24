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

    public function getItem(): mixed
    {
        return $this->item;
    }

    public function setNext(Node $next): void
    {
        $this->next = $next;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }
}
