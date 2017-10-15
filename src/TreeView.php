<?php

namespace Dakzilla;

class TreeView
{

    /** @var Tree */
    protected $tree;

    /**
     * TreeView constructor.
     * @param Tree $tree
     */
    public function __construct(Tree $tree)
    {
        $this->tree = $tree;
    }

    /**
     * @return string
     */
    public function render()
    {
        $nodeList = $this->tree->getNodes();
        $output = '';

        foreach ($nodeList as $node) {
            $output .= $this->getNodeRender($node);
        }

        return $output;
    }

    /**
     * @param Node $node
     * @param int $level
     * @return string
     */
    protected function getNodeRender(Node $node, int $level = 1)
    {
        $repeatValue = max($level - 1, 0);
        $output = '|&nbsp;' . str_repeat('--', $repeatValue) . ($repeatValue ? '&nbsp;' : '') . $node->getName() . '<br/>';
        $childrenOutput = '';

        foreach ($node->getChildren() as $child) {
            $childrenOutput .= $this->getNodeRender($child, $level + 1);
        }

        $output .= $childrenOutput;

        return $output;
    }
}