# WOW Coding exercise
## Notes
- When testing and developing I used `PHP 8.2` so please also use `8.2`
- The example for the queue use behaves like a stack not a queue this is seen with the peek and remove of the queue where it return the last inserted value and not the first
    - So I implemented both a Queue and a Stack. 
    - Normally I would just ask if I see something like this but since I was only able to start on the weekend I decided against it.
```
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
```
- There is an `index.php` that can be run from your cli using `php index.php` or `php8.2 index.php` depending on your setup. This file just runs over an example for each exercise and echo that to the terminal with some extra context added.
- I used PHPUnit 11.3 and this can also be run from your cli using `./vendor/bin/phpunit`
