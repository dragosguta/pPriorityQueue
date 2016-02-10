<?php

class PriorityQueue {

  public function __construct() {
    $this->elements = [];
  }

  //Build the heap with parent > child
  public function heapifyUp($index) {
    $parentIndex = $index / 2;

    //Return if the root element
    if($index < 1) {
      return;
    }

    //Return if parent is greater than child
    if($this->elements[$parentIndex]->priority >= $this->elements[$index]->priority) {
      return;
    }

    //Else, child <=> parent
    $temp = $this->elements[$index];
    $this->elements[$index] = $this->elements[$parentIndex];
    $this->elements[$parentIndex] = $temp;

    $this->heapifyUp($parentIndex);
  }

  public function heapifyDown($index) {
    $childIndex = $index * 2;

    //Stop if at the bottom element
    if($childIndex >= (count($this->elements) - 1))
      return;

    //It's not the last element if the child index is less than last index
    $notLastElement = $childIndex < (count($this->elements) - 1);
    $leftElement = $this->elements[$childIndex];
    $rightElement = $this->elements[$childIndex + 1];
    if($leftElement->priority < $rightElement->priority && $notLastElement)
      $childIndex++;

    //Stop if parent element is bigger than children
    if($this->elements[$index]->priority >= $this->elements[$childIndex]->priority)
      return;

    //Else...swap
    $temp = $this->elements[$childIndex];
    $this->elements[$childIndex] = $this->elements[$index];
    $this->elements[$index] = $temp;

    //Repeat until parent > child
    $this->heapifyDown($childIndex);
  }

  public function addElement($element) {
    array_push($this->elements, $element);

    //Heapify after adding a new element
    $this->heapifyUp(count($this->elements) - 1);
  }

  //Root element will always be the max element due to the heap
  public function pop() {
    //Switch root with last element
    $temp = $this->elements[0];
    $this->elements[0] = $this->elements[count($this->elements) - 1];
    $this->elements[count($this->elements) - 1] = $temp;

    //Remove last element from heap
    $maxElement = array_pop($this->elements);

    //Reorder the heap
    $this->heapifyDown(0);

    return $maxElement;
  }

  public function printQueue() {
    echo "[ ";
    foreach($this->elements as &$value) {
      echo $value->name . "=" . $value->priority . " ";
    }
    echo "]";
  }
}
