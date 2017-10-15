<?php

namespace Dakzilla;

class Node
{
    /** @var string */
    protected $name;

    /** @var mixed */
    protected $value;

    /** @var array */
    protected $children;

    /** @var Node */
    protected $parent;

    /**
     * Node constructor.
     * @param string $name
     * @param $value
     */
    public function __construct(string $name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @param Node $node
     */
    public function addChild(Node $node)
    {
        $node->parent = $this;
        $this->children[] = $node;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return Node
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param $name
     * @return Node|null
     */
    public function getChild($name)
    {
        $nodeList = array_filter($this->getChildren(), function ($node) use ($name) {
            /** @var $node Node */
            return $node->getName() === $name;
        });

        return count($nodeList) ? reset($nodeList) : null;
    }

    /**
     * @return Node|null
     */
    public function getFirstChild()
    {
        return $this->getChildAtIndex(0);
    }

    /**
     * @param int $index
     * @return Node|null
     */
    public function getChildAtIndex(int $index)
    {
        return $this->children[$index] ?? null;
    }
}