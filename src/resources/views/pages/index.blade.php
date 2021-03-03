@extends('blog::layouts.default')
@section('content')
    <div class="bg-gray-200 md:py-5 min-h-screen">
        <div class="container mx-auto max-w-screen-xl">
            <div class="post-list space-y-10">
                <div class="bg-white rounded-lg shadow-sm hover:shadow-lg duration-500 px-2 sm:px-6 md:px-2 py-4 my-6 cursor-pointer dark:bg-gray-900">
                    <div class="grid grid-cols-12 gap-3">
                        <!-- Meta Column -->
                        <div class="col-span-0 sm:col-span-2 text-center hidden sm:block dark:text-gray-400">
                            <img class="rounded-md"
                                 src="https://images.unsplash.com/photo-1502977249166-824b3a8a4d6d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTd8fGZsb3dlcnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                 alt="">
                        </div>

                        <!-- Summary Column -->
                        <div class="col-span-12 sm:col-start-3 sm:col-end-13 px-3 sm:px-0">
                            <div class="flex justify-between items-center hidden sm:block">
                                <span class="font-light text-gray-400 text-sm">2 分钟前</span>
                            </div>

                            <div class="mt-2">
                                <a href="#"
                                   class="sm:text-sm md:text-md lg:text-lg text-gray-700 font-bold hover:underline dark:text-gray-200">【Laravel】
                                    走进
                                    Laravel 源码，带你实现网站主题功能</a>
                                <p class="mt-2 text-gray-500 text-sm md:text-md">
                                    如何在 Laravel 的基础上实现网站换肤、主题切换的功能？今天带你走进 Laravel 源码，来轻松实现这一功能。
                                    如果你使用过 WordPress、Hexo 等等这些优秀的软件，你就会被他主题市场那些个美轮美奂的主题所吸引，那么，有没有想过如何在 Laravel
                                    的基础上来实现这个功能呢？
                                </p>
                            </div>

                            <!-- Question Labels -->
                            <div class="grid grid-cols-2 mt-4 my-auto">
                                <!-- Categories  -->
                                <div class="col-span-12 lg:col-span-8">
                                    <a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/Laravel') }}" class="inline-block rounded-full text-white
                            bg-red-400 hover:bg-red-500 duration-300
                            text-xs
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100">
                                        Laravel
                                    </a>

                                    <a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/PHP') }}" class="inline-block rounded-full text-white
                            bg-yellow-400 hover:bg-yellow-500 duration-300
                            text-xs
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100">
                                        PHP
                                    </a>
                                </div>

                                <!-- User -->
                                <div class="col-none hidden mr-2 lg:block lg:col-start-9 lg:col-end-12">
                                    <a href="#" class="flex items-center">
                                        <img src="http://q1.qlogo.cn/g?b=qq&nk=721796631&s=640"
                                             alt="avatar"
                                             class="mr-2 w-8 h-8 rounded-full">

                                        <div class="text-gray-600 font-bold text-sm hover:underline">
                                            唯一丶
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm hover:shadow-lg duration-500 px-2 sm:px-6 md:px-2 py-4 my-6 cursor-pointer dark:bg-gray-900">
                    <div class="grid grid-cols-12 gap-3">
                        <!-- Meta Column -->
                        <div class="col-span-0 sm:col-span-2 text-center hidden sm:block dark:text-gray-400">
                            <!-- Vote Counts -->
                            <div class="grid grid-rows-2">
                                <div class="inline-block font-medium text-xl">
                                    21
                                </div>

                                <div class="inline-block font-medium text-sm">
                                    讨论
                                </div>
                            </div>

                            <!-- Answer Counts -->
                            <a href="#"
                               class="grid grid-rows-2 mx-auto mb-3 py-1 w-4/5 2lg:w-3/5 rounded-md bg-gray-500">
                                <div class="inline-block font-medium text-2xl text-white">
                                    12
                                </div>

                                <div class="inline-block font-medium text-white mx-1 text-sm lg:text-md">
                                    Feb
                                </div>
                            </a>

                            <!-- View Counts -->
                            <div class="grid my-3">
                            <span class="font-bold text-xs flex font-bold items-center justify-center text-xs">
                                <svg class="h-5 w-5 text-black inline mr-1 dark:text-gray-400" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path
                                            stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="2"/>  <path
                                            d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2"/>  <path
                                            d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2"/></svg>
                                1213
                            </span>
                            </div>
                        </div>

                        <!-- Summary Column -->
                        <div class="col-span-12 sm:col-start-3 sm:col-end-13 px-3 sm:px-0">
                            <div class="flex justify-between items-center hidden sm:block">
                                <span class="font-light text-gray-400 text-sm">2 分钟前</span>
                            </div>

                            <div class="mt-2">
                                <a href="#"
                                   class="sm:text-sm md:text-md lg:text-lg text-gray-700 font-bold hover:underline dark:text-gray-200">全新
                                    Xdebug 3.0 配置 PHP STORM 调试教程</a>
                                <p class="mt-2 text-gray-500 text-sm md:text-md">随着 PHP 8.0 发布的前后，Xdebug 也发布了全新的 3
                                    版本。与以往的
                                    Xdebug 繁琐的配置不同，全新的 Xdebug 3。本文主要针对 PHP STORM 如何安装使用，其他开发工具可能不太适用，值得注意的是您需要安装 PHP
                                    STORM
                                    2020.3 以上的版本才能使用 Xdebug 3。</p>
                            </div>

                            <!-- Question Labels -->
                            <div class="grid grid-cols-2 mt-4 my-auto">
                                <!-- Categories  -->
                                <div class="col-span-12 lg:col-span-8">
                                    <a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/调试') }}" class="inline-block rounded-full text-white
                            bg-red-400 hover:bg-red-600 duration-300
                            text-xs
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100">
                                        调试
                                    </a>

                                    <a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/PHP') }}" class="inline-block rounded-full text-white
                            bg-yellow-400 hover:bg-yellow-600 duration-300
                            text-xs
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100">
                                        PHP
                                    </a>

                                    <a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/xdebug') }}" class="inline-block rounded-full text-white
                            bg-green-400 hover:bg-green-600 duration-300
                            text-xs
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100">
                                        Xdebug
                                    </a>


                                    <a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/PHP-Storm') }}" class="inline-block rounded-full text-white
                            bg-blue-400 hover:bg-blue-600 duration-300
                            text-xs
                            mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
                            opacity-90 hover:opacity-100">
                                        PHP STORM
                                    </a>
                                </div>

                                <!-- User -->
                                <div class="col-none hidden mr-2 lg:block lg:col-start-9 lg:col-end-12">
                                    <a href="#" class="flex items-center">
                                        <img src="http://q1.qlogo.cn/g?b=qq&nk=721796631&s=640"
                                             alt="avatar"
                                             class="mr-2 w-8 h-8 rounded-full">

                                        <div class="text-gray-600 font-bold text-sm hover:underline">
                                            唯一丶
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection