<?php


namespace SoleX\Blog\App\Utils;


use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\NodeFinder;
use PhpParser\ParserFactory;

class Helper
{
    /**
     * 解析文件中的类或者接口
     *
     * @param string $path
     *
     * @return string
     */
    public static function parseFileClass(string $path): ?string
    {
        if (!is_file($path)) {
            return null;
        }
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $stmts = $parser->parse(file_get_contents($path));
        $nodeFinder = new NodeFinder();
        $namespace = $nodeFinder->findFirstInstanceOf($stmts, Namespace_::class);
        if (!$namespace instanceof Namespace_) {
            return null;
        }
        $interface = $nodeFinder->findFirstInstanceOf($namespace, Interface_::class);
        if (!$interface instanceof Interface_ || !$interface instanceof Class_) {
            return null;
        }
        $contract = $namespace->name->parts;
        $contract[] = $interface->name->name;
        return implode('\\', $contract);
    }
}