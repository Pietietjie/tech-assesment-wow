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
*/
final class Queue
{
}
