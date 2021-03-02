<?php


namespace SoleX\Blog\App\Contracts\Services;


use SoleX\Blog\App\Models\Page;

interface PageService
{
    public function handle(): Page;
}