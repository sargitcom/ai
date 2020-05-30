<?php

require_once('./vendor/autoload.php');
require_once('breadth_first_search/functions.php');

$nonDirectedGraph = new Structures_Graph(false);

$nodes = [];

$a = 'A';
$nodes['A'] = new Structures_Graph_Node();
$nodes['A']->setMetadata('name', $a);

$b = 'A';
$nodes['B'] = new Structures_Graph_Node();
$nodes['A']->setMetadata('name', $a);

$nodes['C'] = new Structures_Graph_Node();
$nodes['D'] = new Structures_Graph_Node();
$nodes['E'] = new Structures_Graph_Node();

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
$endNode   = $nodes['E']->getData();

if ($node === $endNode) {
    return Solution($node);
}

$frontier = [$node];
$explored = [];

while (true) {
    if (empty($frontier)) {
        echo "Could not find sollution";
        break;
    }

    $node = array_pop($frontier);
    $explored = $node;

    $nodeNeighbours = $nodes[$node]->getNeighbours();

    var_dump($nodeNeighbours);

    foreach () {

    }

}
*/


