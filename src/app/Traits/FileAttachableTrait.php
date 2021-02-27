<?php


namespace SoleX\Blog\App\Traits;


use Illuminate\Database\Eloquent\Model;
use RuntimeException;
use SoleX\Blog\App\Models\File;

/**
 * Trait FileAttachableTrait
 *
 * @package SoleX\Blog\App\Traits
 * @mixin Model
 */
trait FileAttachableTrait
{
    protected function fileAttachableOne(null|string|false $group = false)
    {
        return $this->morphOne(File::class, 'attachable')->attachableGroup($this->wrapperGroup($group));
    }

    private function wrapperGroup(string|false $group = false): ?string
    {
        if ($group === false) {
            return null;
        }
        $trace = debug_backtrace(
            DEBUG_BACKTRACE_IGNORE_ARGS, 3
        );
        $caller = last($trace);
        $attach = $caller['function'] ?? null;
        empty($attach) && throw  new RuntimeException('Not found attach group, in: ' . $caller['class']);
        return $attach;
    }

    protected function fileAttachableMany(string $group = null)
    {
        return $this->morphMany(File::class, 'attachable')->attachableGroup($this->wrapperGroup($group));
    }
}