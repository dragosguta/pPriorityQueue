<?php
interface Comparable {
  public function compareTo($element);
}

class ElementException extends Exception {}

class Element implements Comparable {

  public function __construct($name, $priority) {
    $this->name = $name;
    $this->priority = $priority;
  }

  public function compareTo($element) {
    if(!$element instanceof Element) {
      throw new ElementException('Can only compare Element objects');
    }

    if($this->priority > $element->priority) {
      return 1;
    }
    elseif($this->priority < $element->priority) {
      return -1;
    }
    return 0;
  }
}
