<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Database\Eloquent\Collection;
use SoleX\Blog\App\Models\Page as PageModel;

interface Page
{
    /**
     * @return Collection<PageModel>
     */
    public function getAll(): Collection;

    public function findByUrl(string $url): PageModel;
}