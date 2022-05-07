<?php


namespace SoleX\Blog\Utils;


use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\NodeFinder;
use PhpParser\ParserFactory;

class ParseFileClass
{
    private array $stmts;
    private NodeFinder $nodeFinder;
    private ?string $namespace;
    private ?string $class;
    private ?string $fullClass;

    public function __construct(private ?string $path = null)
    {
        $this->parse();
    }

    private function parse()
    {
        if (!empty($this->stmts) && $this->nodeFinder instanceof NodeFinder) {
            return;
        }
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $this->stmts = $parser->parse(file_get_contents($this->path)) ?: [];
        $this->nodeFinder = new NodeFinder();
    }

    public function getFullClass(): ?string
    {
        if (!empty($this->fullClass)) {
            return $this->fullClass;
        }
        $class = explode('\\', $this->getNamespace());
        $class = [...$class, ...explode('\\', $this->getClass())];
        return $this->fullClass = implode('\\', $class);
    }

    public function getNamespace(): ?string
    {
        if (!empty($this->namespace)) {
            return $this->namespace;
        }
        $namespace = $this->nodeFinder->findFirstInstanceOf($this->stmts, Namespace_::class);
        if (!$namespace instanceof Namespace_) {
            return null;
        }
        return $this->namespace = implode('\\', $namespace->name->parts);
    }

    public function getClass(): ?string
    {
        if (!empty($this->class)) {
            return $this->class;
        }
        $interface = $this->nodeFinder->findFirstInstanceOf($this->stmts, Interface_::class);
        if ($interface instanceof Interface_) {
            return $this->class = $interface->name->name;
        }
        $class = $this->nodeFinder->findFirstInstanceOf($this->stmts, Class_::class);
        if ($class instanceof Class_) {
            return $this->class = $class->name->name;
        }
        return null;
    }
}
