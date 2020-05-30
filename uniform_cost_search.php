<?php

require_once('./vendor/autoload.php');

use \Ds\PriorityQueue;

$nonDirectedGraph = new Structures_Graph(false);

$nodes = [];

$a = 'A';
$costA = 0;
$nodes['A'] = new Structures_Graph_Node();
$nodes['A']->setMetadata('name', $a);
$nodes['A']->setMetadata('cost', $costA);

$b = 'B';
$costB = 3;
$nodes['B'] = new Structures_Graph_Node();
$nodes['B']->setMetadata('name', $b);
$nodes['B']->setMetadata('cost', $costB);

$c = 'C';
$costC = 17;
$nodes['C'] = new Structures_Graph_Node();
$nodes['C']->setMetadata('name', $c);
$nodes['C']->setMetadata('cost', $costC);

$d = 'D';
$costD = 23;
$nodes['D'] = new Structures_Graph_Node();
$nodes['D']->setMetadata('name', $d);
$nodes['D']->setMetadata('cost', $costD);

$e = 'E';
$costE = 15;
$nodes['E'] = new Structures_Graph_Node();
$nodes['E']->setMetadata('name', $e);
$nodes['E']->setMetadata('cost', $costE);

$nonDirectedGraph ->addNode($nodes['A']);
$nonDirectedGraph ->addNode($nodes['B']);
$nonDirectedGraph ->addNode($nodes['C']);
$nonDirectedGraph ->addNode($nodes['D']);
$nonDirectedGraph ->addNode($nodes['E']);

$nodes['A']->connectTo($nodes['B']);
$nodes['B']->connectTo($nodes['C']);
$nodes['B']->connectTo($nodes['D']);
$nodes['D']->connectTo($nodes['C']);
$nodes['C']->connectTo($nodes['E']);
$nodes['E']->connectTo($nodes['D']);

$node = $nodes['A']->getMetadata('name');
$endNode = $nodes['E']->getMetadata('name');

if ($node === $endNode) {
    echo "Sollution found\n";
    echo $node . "\n";
}


$frontier = new PriorityQueue();
$frontier->push($node, $nodes[$node]->getMetadata('cost'));
$explored = [];

while (true) {
    if ($frontier->isEmpty()) {
        echo "Could not find sollution";
        break;
    }

    $node = $frontier->pop();

    if ($node === $endNode) {
        echo "Sollution found\n";
        echo $node . "\n";
        return;
    }

    $explored[] = $node;

    $nodeNeighbours = $nodes[$node]->getNeighbours();

    foreach ($nodeNeighbours as $siblingNode) {

        $child = $siblingNode->getMetadata('name');

        if (!in_array($child, $explored) && !in_array($child, $frontier->toArray())) {
            $frontier->push($child, $nodes[$child]->getMetadata('cost'));
        }/* else {
            $frontier->getIterator()->rewind()

            $frontier->getIterator()->valid()

            {
                echo "Sollution found\n";
                echo $child . "\n";
                return;
            }

        }*/

    }
}
