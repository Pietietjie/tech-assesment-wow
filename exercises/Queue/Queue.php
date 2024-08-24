<?php
declare(strict_types=1);
namespace Exercises\Queue;
/**
 * Create a Queue.
 *
 * When queue is empty remove and peek methods should return null.
 *
 * @property mixed[] $queue
 * @method void add(mixed $value)
 * @method mixed|null remove() - returns the last element of the queue and removes it from the queue.
 * @method mixed|null peek() - returns the last element of the queue and does not remove it from the queue.
 * @method static self zip(self $queue1, self $queue2) interweaves two provided queues
 * @example $queue1 = new Queue();
 * $queue1->add(1);
 * $queue1->add(2);
 * $queue1->add(3);
 * $queue1->peek() === 3;
 * $queue1->remove() === 3;
 *
 * $queue2 = new Queue();
 *
 * $queue2->add('a');
 * $queue2->add('b');
 * $queue2->add('c');
 *
 * Queue::zip(queue1, queue2) -> [1, 'a', 2, 'b', 'c']
 *
 * !important Note: that the above example's behavior is not that of a queue but a stack as a Queue is first in first out and a stack is last in first out
 * I will implement both to cover all bases
 */
final class Queue
{
    private ?Node $first = null;
    private ?Node $last = null;
    public int $length = 0;

    public function add(mixed $value): void
    {
        if ($this->first == null) {
            $this->first = $this->last = new Node($value);
        } else {
            $this->last->setNext(new Node($value));
            $this->last = $this->last->getNext();
        }
        $this->length++;
    }

    public function peek(): mixed
    {
        if ($this->first == null) {
            return null;
        }
        return $this->first->getItem();
    }

    public function remove(): mixed
    {
        if ($this->first == null) {
            return null;
        }
        $previousValue = $this->first->getItem(); 
        $this->first = $this->first->getNext();
        $this->length--;
        return $previousValue;
    }

    public function toArray(): array
    {
        $clonedQueue = clone $this;
        $result = [];

        while ($clonedQueue->length > 0) {
            $result[] = $clonedQueue->remove();
        }
        return $result;
    }

    public static function zip(Queue ...$queues): Queue
    {
        $zippedQueue = new Queue;
        $tempQueues = [];
        foreach ($queues as $i => $queue) {
            $tempQueues[$i] = clone $queue;
        }
        $queues = $tempQueues;

        while (count($queues) > 0) {
            foreach ($queues as $i => $queue) {
                if ($queue->length == 0) {
                    unset($queues[$i]);
                    continue;
                }
                $zippedQueue->add($queue->remove());
            }
        }
        return $zippedQueue;
    }
}
