# PHP tree structure

[![Maintainability](https://api.codeclimate.com/v1/badges/387e9641289840ffa1e9/maintainability)](https://codeclimate.com/github/dakzilla/php-tree-structure/maintainability)

This is just a small experiment that I did to play around with tree structures and nodes in PHP.

## Examples

### Setting up the test file
```php
<?php
include('vendor/autoload.php');

use Dakzilla\Node;
use Dakzilla\Tree;
```

### Initializing a new tree

```php
<?php
$tree = new Tree();

$firstNode = new Node('first node', 1);
$secondNode = new Node('second node', 2);
$secondNodeFirstChild = new Node('second node first child', 21);
$secondNode->addChild($secondNodeFirstChild);
$thirdNode = new Node('third node', 3);

$tree->addNode($firstNode)
    ->addNode($secondNode)
    ->addNode($thirdNode);
```

### Outputting a tree to HTML
```php
echo $tree;
```
Result:
```
| first node
| second node
| -- second node first child
| third node
```

### Traversing the tree
This example sets up a new tree with up to 4 levels of child nodes. It is possible to traverse up and down the tree, either by using the different methods to navigate to a node.

```php
$tree = new Tree();

$firstNode = new Node('first node', 1);
$secondNode = new Node('second node', 2);
$secondNodeFirstChild = new Node('second node first child', 21);
$secondNodeSecondChild = new Node('second node second child', 22);
$secondNodeSecondChildFirstChild = new Node('second node second child first child', 221);
$secondNodeSecondChildFirstChildFirstChild = new Node('second node second child first child first child', 2211);
$secondNodeSecondChildSecondChild = new Node('second node second child second child', 222);
$thirdNode = new Node('third node', 3);

$secondNode->addChild($secondNodeFirstChild);
$secondNodeSecondChild->addChild($secondNodeSecondChildFirstChild);
$secondNodeSecondChild->addChild($secondNodeSecondChildSecondChild);
$secondNodeSecondChildFirstChild->addChild($secondNodeSecondChildFirstChildFirstChild);
$secondNode->addChild($secondNodeSecondChild);

$tree
    ->addNode($firstNode)
    ->addNode($secondNode)
    ->addNode($thirdNode);
```

```php
$node = $tree->getNode('second node')
                ->getFirstChild()
                ->getParent()
                ->getChild('second node second child')
                ->getChildAtIndex(1);
                
var_dump($node->getName());
var_dump($node->getValue());
```

Result:

```
string(37) "second node second child second child"
int(222) 
```

And if we output the tree

```php
echo $tree;
```

Result:

```
| first node
| second node
| -- second node first child
| -- second node second child
| ---- second node second child first child
| ------ second node second child first child first child
| ---- second node second child second child
| third node
```