<?php


namespace SoleX\Blog\Traits;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use JetBrains\PhpStorm\Pure;
use SoleX\Blog\BlogServiceProvider;

trait LangTrait
{
    public function __(
        $key = null,
        $replace = [],
        $locale = null
    ): array|string|Translator|Application|null {
        return __($this->wrapperKey($key), $replace, $locale);
    }

    #[Pure]
    private function wrapperKey(
        $key
    ): string {
        return sprintf('%s::%s', BlogServiceProvider::NAMESPACE, $key);
    }

}
