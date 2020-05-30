<?php

require_once('./vendor/autoload.php');
require_once('breadth_first_search/functions.php');

$nonDirectedGraph = new Structures_Graph(false);

$nodes = [];

$a = 'A';
$nodes['A'] = new Structures_Graph_Node();
$nodes['A']->setMetadata('name', $a);

$b = 'B';
$nodes['B'] = new Structures_Graph_Node();
$nodes['B']->setMetadata('name', $b);

$c = 'C';
$nodes['C'] = new Structures_Graph_Node();
$nodes['C']->setMetadata('name', $c);

$d = 'D';
$nodes['D'] = new Structures_Graph_Node();
$nodes['D']->setMetadata('name', $d);

$e = 'E';
$nodes['E'] = new Structures_Graph_Node();
$nodes['E']->setMetadata('name', $e);

$nonDirectedGraph ->addNode($nodes['A']);
$nonDirectedGraph ->addNode($nodes['B']);
$nonDirectedGraph ->addNode($nodes['C']);
$nonDirectedGraph ->addNode($nodes['D']);
$nonDirectedGraph ->addNode($nodes['E']);

$nodes['A']->connectTo($nodes['B']);
//$nodes['A']->connectTo($nodes['E']);
$nodes['B']->connectTo($nodes['C']);
$nodes['B']->connectTo($nodes['D']);
$nodes['D']->connectTo($nodes['C']);
$nodes['C']->connectTo($nodes['E']);
$nodes['E']->connectTo($nodes['D']);

$node = $nodes['A']->getMetadata('name');
$endNode   = $nodes['E']->getMetadata('name');

if ($node === $endNode) {
    return Solution($node);
}

$frontier = [];
$frontier[] = $node;
$explored = [];

while (true) {
    if (empty($frontier)) {
        echo "Could not find sollution";
        break;
    }

    $node = array_pop($frontier);
    $explored[] = $node;

    $nodeNeighbours = $nodes[$node]->getNeighbours();

    foreach ($nodeNeighbours as $siblingNode) {

        $child = $siblingNode->getMetadata('name');

        if (!in_array($child, $explored) && !in_array($child, $frontier)) {
            if ($child === $endNode) {
                echo "Path found\n";
                echo $child . "\n";
                return;
            }
            $frontier[] = $child;
        }

    }
}




