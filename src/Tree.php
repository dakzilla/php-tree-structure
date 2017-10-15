<?php

namespace Dakzilla;

class Tree
{
    /** @var array */
    protected $nodeList;

    public function __construct()
    {
        $this->nodeList = [];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $treeView = new TreeView($this);

        return $treeView->render();
    }

    /**
     * @param Node $node
     * @return $this
     */
    public function addNode(Node $node)
    {
        $this->nodeList[] = $node;

        return $this;
    }

    /**
     * @return array
     */
    public function getNodes()
    {
        return $this->nodeList;
    }

    /**
     * @param $name
     * @return Node|null
     */
    public function getNode($name)
    {
        $nodeList = array_filter($this->nodeList, function ($node) use ($name) {
            /** @var $node Node */
            return $node->getName() === $name;
        });

        return count($nodeList) ? reset($nodeList) : null;
    }
}