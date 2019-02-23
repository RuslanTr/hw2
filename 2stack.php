<?php

    class Stack
    {
        private $stack;
        private $limit;

        public function _construct($limit = 10)
        {
            $this->limit = $limit;
            $this->stack = array();
        }

        public function push($item)
        {
            if(count($this->stack) < $this->limit){
                array_unshift($this->stack, $item);
            }
            else {
                exit('Stack if full');
            }
        }
        public function pop()
        {
            if($this->isEmpty()){
                exit('Stack if empty');
            }
            else {
                return array_shift($this->stack);
            }
        }
        public function top()
        {
            return current($this->stack);
        }
        public function isEmpty()
        {
            return empty($this->stack);
        }
    }

    class Queue
    {
        private $stack1, $stack2;
        public function __construct()
        {
            $this->stack1 = new Stack();
            $this->stack2 = new Stack();
        }
        public function enqueue($value)
        {
            $this->stack1->add($value);
        }
        public function dequeue()
        {
            if ($this->stack1->isEmpty() && $this->stack2->isEmpty()) {
                exit('Queue is empty!');
            } elseif ($this->stack2->isEmpty()) {
                while (!$this->stack1->isEmpty()) {
                    $this->stack2->add($this->stack1->dequeue());
                }
            }
            return $this->stack2->dequeue();
        }
    }



