<?php

namespace Tests\Unit;

use Exercises\Queue\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function test_queue_empty()
    {
        $queue = new Queue;
        $this->assertEquals(expected: null, actual: $queue->peek());
        $this->assertEquals(expected: null, actual: $queue->remove());
        $this->assertEquals(expected: 0, actual: $queue->length);
    }

    public function test_queue_add_single_item()
    {
        $queue = new Queue;
        $queue->add(':)');
        $this->assertEquals(expected: 1, actual: $queue->length);
        $this->assertEquals(expected: ':)', actual: $queue->peek());
        $this->assertEquals(expected: ':)', actual: $queue->remove());

        $this->assertEquals(expected: 0, actual: $queue->length);
    }

    public function test_queue_add_multiple_items()
    {
        $queue = new Queue;
        $queue->add(':)');
        $queue->add(':|');
        $queue->add(':(');
        $this->assertEquals(expected: 3, actual: $queue->length);
        $this->assertEquals(expected: ':)', actual: $queue->peek());
        $this->assertEquals(expected: ':)', actual: $queue->remove());

        $this->assertEquals(expected: 2, actual: $queue->length);
        $this->assertEquals(expected: ':|', actual: $queue->peek());
        $this->assertEquals(expected: ':|', actual: $queue->remove());

        $this->assertEquals(expected: 1, actual: $queue->length);
        $this->assertEquals(expected: ':(', actual: $queue->peek());
        $this->assertEquals(expected: ':(', actual: $queue->remove());

        $this->assertEquals(expected: 0, actual: $queue->length);
    }

    public function test_queue_zip_two_queues_together()
    {
        $queue = new Queue;
        $queue->add(':)');
        $queue->add(':|');
        $queue->add(':(');

        $queueTheSecond = new Queue;
        $queueTheSecond->add(0);
        $queueTheSecond->add(10);

        $queueTheZipped = Queue::zip($queue, $queueTheSecond);

        $this->assertEquals(expected: 0, actual: $queue->length);
        $this->assertEquals(expected: 0, actual: $queueTheSecond->length);

        $this->assertEquals(expected: 5, actual: $queueTheZipped->length);
        $this->assertEquals(expected: ':)', actual: $queueTheZipped->peek());
        $this->assertEquals(expected: ':)', actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 4, actual: $queueTheZipped->length);
        $this->assertEquals(expected: 0, actual: $queueTheZipped->peek());
        $this->assertEquals(expected: 0, actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 3, actual: $queueTheZipped->length);
        $this->assertEquals(expected: ':|', actual: $queueTheZipped->peek());
        $this->assertEquals(expected: ':|', actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 2, actual: $queueTheZipped->length);
        $this->assertEquals(expected: 10, actual: $queueTheZipped->peek());
        $this->assertEquals(expected: 10, actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 1, actual: $queueTheZipped->length);
        $this->assertEquals(expected: ':(', actual: $queueTheZipped->peek());
        $this->assertEquals(expected: ':(', actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 0, actual: $queueTheZipped->length);
    }

    public function test_queue_zip_with_three_queues()
    {
        $queue = new Queue;
        $queue->add(':)');

        $queueTheSecond = new Queue;
        $queueTheSecond->add(0);

        $queueTheThird = new Queue;
        $queueTheThird->add(false);

        $queueTheZipped = Queue::zip($queue, $queueTheSecond, $queueTheThird);

        $this->assertEquals(expected: 0, actual: $queue->length);
        $this->assertEquals(expected: 0, actual: $queueTheSecond->length);
        $this->assertEquals(expected: 0, actual: $queueTheThird->length);

        $this->assertEquals(expected: 3, actual: $queueTheZipped->length);
        $this->assertEquals(expected: ':)', actual: $queueTheZipped->peek());
        $this->assertEquals(expected: ':)', actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 2, actual: $queueTheZipped->length);
        $this->assertEquals(expected: 0, actual: $queueTheZipped->peek());
        $this->assertEquals(expected: 0, actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 1, actual: $queueTheZipped->length);
        $this->assertEquals(expected: false, actual: $queueTheZipped->peek());
        $this->assertEquals(expected: false, actual: $queueTheZipped->remove());

        $this->assertEquals(expected: 0, actual: $queueTheZipped->length);
    }
}
