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

    public function getItem(): mixed
    {
        return $this->item;
    }

    public function setPrevious(Node $previous): void
    {
        $this->previous = $previous;
    }

    public function getPrevious(): ?Node
    {
        return $this->previous;
    }
}
