@extends('layouts.default')
@section('content')
    <div class="bg-gray-200 md:py-5 min-h-screen dark:bg-transparent md:grid md:grid-cols-12">
        <div class="max-w-screen-xl md:col-span-7 md:col-start-2">
            <div class="post-list sm:space-y-10 space-y-5">
                @inject('postRepository', \SoleX\Blog\App\Contracts\Repositories\PostRepository::class)
                @php
                    $list = $postRepository->listForPaginate(perPage: min(\Illuminate\Support\Facades\Request::get('per_page', 10), 20), with: ['tags','user','cover'])
                @endphp
                @each('partials.index.post-item', $list->getCollection() ,'post')
                {{ $list->render() }}
            </div>
        </div>
        <div class="md:col-span-3 sm:rounded-md my-6 sm:ml-20 md:ml-10">
            <div class="bg-white sm:rounded-md sm:dark:bg-gray-700 dark:bg-transparent overflow-hidden sm:shadow-md">
                <div class="text-white p-3 bg-gray-700 dark:bg-gray-900">随机推荐</div>
                <ul class="leading-6 p-0">
                    <li class="py-3.5 border-b border-gray-50 dark:border-opacity-0 dark:hover:bg-gray-500 hover:bg-blue-50 flex">
                        <span class="pl-3 ri-link-m mr-1.5 align-middle dark:text-gray-100"></span>
                        <a href="" class="block text-gray-500 dark:text-gray-100 dark:hover:text-gray-100 hover:text-gray-700 w-full">高效搜索信息，你需要掌握这些谷歌搜索技巧</a>
                    </li>
                    <li class="py-3.5 border-b border-gray-50 dark:border-opacity-0 dark:hover:bg-gray-500 hover:bg-blue-50 flex">
                        <span class="pl-3 ri-link-m mr-1.5 align-middle dark:text-gray-100"></span>
                        <a href="" class="block text-gray-500 dark:text-gray-100 dark:hover:text-gray-100 hover:text-gray-700 w-full">高效搜索信息，你需要掌握这些谷歌搜索技巧</a>
                    </li>
                    <li class="py-3.5 border-b border-gray-50 dark:border-opacity-0 dark:hover:bg-gray-500 hover:bg-blue-50 flex">
                        <span class="pl-3 ri-link-m mr-1.5 align-middle dark:text-gray-100"></span>
                        <a href="" class="block text-gray-500 dark:text-gray-100 dark:hover:text-gray-100 hover:text-gray-700 w-full">高效搜索信息，你需要掌握这些谷歌搜索技巧</a>
                    </li>
                    <li class="py-3.5 border-b border-gray-50 dark:border-opacity-0 dark:hover:bg-gray-500 hover:bg-blue-50 flex">
                        <span class="pl-3 ri-link-m mr-1.5 align-middle dark:text-gray-100"></span>
                        <a href="" class="block text-gray-500 dark:text-gray-100 dark:hover:text-gray-100 hover:text-gray-700 w-full">高效搜索信息，你需要掌握这些谷歌搜索技巧</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection