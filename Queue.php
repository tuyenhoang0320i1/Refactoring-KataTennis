<?php
class Element
{
    public $value;
    public $link;
}

class Queue
{
    private $front = null;
    private $back = null;


    public function isEmpty()
    {
        return $this->front == null;
    }

    public function enqueue($value)
    {
        $oldBack = $this->back;
        $this->back = new Element();
        $this->back->value = $value;
        if ($this->isEmpty()) {
            $this->front = $this->back;
        } else {
            $oldBack->link = $this->back;
        }
    }


    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $removedValue = $this->front->value;
        $this->front = $this->front->link;
        return $removedValue;
    }
}


$queue = new Queue();
$queue->enqueue("Start");
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
$queue->enqueue(4);
$queue->enqueue("End");
while(!$queue->isEmpty()){
    echo "<pre>";
    print_r($queue->dequeue()."\n");
    echo "</pre>";
}