<?php

class Node {
  public $x;
  public $y;
  public $distance;

  public function __construct($x, $y, $distance) {
    $this->x = $x;
    $this->y = $y;
    $this->distance = $distance;
  }
}

class MazeSolver {
  private $maze;

  public function __construct($maze) {
    $this->maze = $maze;
  }

  public function findShortestPath($start, $end) {
    $visited = array();
    $queue = array(new Node($start[0], $start[1], 0));

    while (!empty($queue)) {
      $node = array_shift($queue);

      if ($node->x == $end[0] && $node->y == $end[1]) {
        return $node->distance;
      }

      $neighbors = $this->getNeighbors($node);

      foreach ($neighbors as $neighbor) {
        $key = $neighbor->x . ',' . $neighbor->y;

        if (!isset($visited[$key])) {
          $visited[$key] = true;
          array_push($queue, $neighbor);
        }
      }
    }

    return -1;
  }

  private function getNeighbors($node) {
    $neighbors = array();

    $x = $node->x;
    $y = $node->y;
    $distance = $node->distance;

    if (isset($this->maze[$x-1][$y]) && $this->maze[$x-1][$y] > 0) {
      array_push($neighbors, new Node($x-1, $y, $distance + $this->maze[$x-1][$y]));
    }

    if (isset($this->maze[$x+1][$y]) && $this->maze[$x+1][$y] > 0) {
      array_push($neighbors, new Node($x+1, $y, $distance + $this->maze[$x+1][$y]));
    }

    if (isset($this->maze[$x][$y-1]) && $this->maze[$x][$y-1] > 0) {
      array_push($neighbors, new Node($x, $y-1, $distance + $this->maze[$x][$y-1]));
    }

    if (isset($this->maze[$x][$y+1]) && $this->maze[$x][$y+1] > 0) {
      array_push($neighbors, new Node($x, $y+1, $distance + $this->maze[$x][$y+1]));
    }

    return $neighbors;
  }
}


$maze = explode("\n", $_POST["maze"]);
      
foreach ($maze as &$row) {
    $row = explode(",", trim($row));
      foreach ($row as &$ro) {
        $ro = intval($ro);
      }
   }

// Создаем объект MazeSolver
$solver = new MazeSolver($maze);

$start_input = explode(',', $_POST['start']);
$end_input = explode(',', $_POST['end']);

$start = array_map('intval', $start_input);
$end = array_map('intval', $end_input);

// Находим самый короткий путь 
$shortestPath = $solver->findShortestPath($start, $end);
$shortestPath--;

echo ("Самый короткий путь: " . $shortestPath);

