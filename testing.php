<?php
require 'element.php';
require 'priorityqueue.php';

class pqTesting {

  public function __construct() {
    $this->e = null;
    $this->q = new PriorityQueue();
  }

  public function setUp() {
    $this->e = new Element("element1", 17);
    $this->q->addElement($this->e);
    $this->e = new Element("element4", 36);
    $this->q->addElement($this->e);
    $this->e = new Element("element3",7);
    $this->q->addElement($this->e);
    $this->e = new Element("element6", 100);
    $this->q->addElement($this->e);
    $this->e = new Element("element8", 19);
    $this->q->addElement($this->e);
    $this->e = new Element("element5", 1);
    $this->q->addElement($this->e);
    $this->e = new Element("element2", 25);
    $this->q->addElement($this->e);
    $this->e = new Element("element7", 2);
    $this->q->addElement($this->e);
    $this->e = new Element("element9", 3);
    $this->q->addElement($this->e);
    $this->e = new Element("element10", 110);
    $this->q->addElement($this->e);
  }

  public function print() {
    $this->q->printQueue();
  }

  public function pop() {
    var_dump($this->q->pop());
  }
}

$test = new pqTesting();
$test->setUp();
$test->print();
$test->pop();
$test->print();

