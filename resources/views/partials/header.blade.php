<nav class="bg-white shadow dark:bg-gray-800 md:grid md:grid-cols-12">
    <div class="px-6 py-3 mx-auto md:px-0 md:mx-0 md:col-span-10 md:col-start-2">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a class="text-xl font-bold text-gray-800 dark:text-white md:text-2xl hover:text-gray-700 dark:hover:text-gray-300"
                       href="#">SOLE-X</a>
                    <div class="hidden mx-10 md:block">
                        <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </svg>
                                </span>

                            <input type="text"
                                   class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-gray-500 dark:focus:border-blue-500 focus:outline-none"
                                   placeholder="Search">
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button"
                            class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                            aria-label="toggle menu" id="toggle-header-menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div class="items-center md:flex transform-gpu transition-all duration-300"
                 id="header-menu">
                <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                    <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0"
                       href="#">首页</a>
                    <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0"
                       href="#">存档</a>
                    @can(\SoleX\Blog\Enums\Abilities::SuperAdmin->value)
                        <a class="my-1 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:mx-4 md:my-0"
                           href="{{ route('admin.login') }}">管理后台</a>
                    @endcan
                </div>


                <div class="flex items-center py-2 -mx-1 md:mx-0">
                    @guest
                        <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-blue-600 md:mx-2 md:w-auto"
                           href="{{ route('login') }}">登录</a>
                        <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform text-gray-400 rounded-md hover:text-gray-900 md:mx-0 md:w-auto"
                           href="{{ route('register') }}">注册</a>
                    @else
                        <div class="relative" id="toggle-header-notification">
                            {{--消息按钮--}}
                            <button class="relative z-10 block pl-2 pr-3 bg-white rounded-md dark:bg-gray-800 focus:outline-none">
                                <svg class="w-5 h-5 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                </svg>
                            </button>

                            {{--消息列表--}}
                            <div class="absolute right-0 z-20 mt-2 overflow-hidden bg-white rounded-md shadow-lg w-80 dark:bg-gray-800 hidden"
                                 id="header-notification">
                                <div class="border overflow-hidden dark:border-gray-800">
                                    <a href="#"
                                       class="flex items-center px-4 py-3 -mx-2 transition-colors duration-200 transform border-b hover:bg-gray-100 dark:hover:bg-gray-700 dark:border-gray-700">
                                        <img class="object-cover w-8 h-8 mx-1 rounded-full"
                                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                             alt="avatar">
                                        <p class="mx-2 text-sm text-gray-600 dark:text-white">
                                            <span class="font-bold">管理员</span> 删除了您的评论 <span
                                                    class="text-gray-300 ml-2">2 分钟前</span>
                                        </p>
                                    </a>
                                </div>
                                <a href="#"
                                   class="block py-2 font-bold text-center text-white bg-gray-800 bg-gray-400">查看全部通知</a>
                            </div>
                        </div>

                        {{--头像按钮--}}
                        <div class="relative" id="toggle-header-profile">
                            <button class="relative z-10 block p-2 bg-white rounded-md dark:bg-gray-800 focus:outline-none">
                                <x-user.avatar onerror="this.src='http://q1.qlogo.cn/g?b=qq&nk=721796631&s=640'"
                                               class="w-10 h-10 border rounded-full"></x-user.avatar>
                            </button>
                            {{--头像列表--}}
                            <div class="absolute right-0 z-20 w-32 mt-2 bg-white rounded-md overflow-hidden shadow-xl dark:bg-gray-800 hidden border-gray-100 border dark:border-gray-700"
                                 id="header-profile">
                                <a href="{{ route('user.profile') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    <svg class="h-6 w-6 inline" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    个人中心
                                </a>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    <svg class="h-6 w-6 inline" width="24"
                                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                    </svg>
                                    消息中心
                                </a>
                                <a href="#"
                                   class="disabled:opacity-50 cursor-not-allowed block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    <svg class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    意见反馈
                                </a>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    <svg class="h-6 w-6 inline" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                    个人设置
                                </a>
                                <a href="{{ route('logout') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                                    <svg class="h-6 w-6 inline" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M7 6a7.75 7.75 0 1 0 10 0" />
                                        <line x1="12" y1="4" x2="12" y2="12" />
                                    </svg>
                                    退出登录
                                </a>
                            </div>
                        </div>

                    @endguest
                </div>

                <div class="mt-3 md:hidden">
                    <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </svg>
                            </span>

                        <input type="text"
                               class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-gray-300 dark:focus:border-blue-500 focus:outline-none"
                               placeholder="Search">
                    </div>
                </div>
            </div>
        </div>

        <div class="py-2 mt-3 -mx-3 overflow-y-auto whitespace-nowrap scroll-hidden">
            <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
               href="{{ \SoleX\Blog\Utils\Helper::url('/') }}">首页</a>
            @inject('categoryRepository', \SoleX\Blog\Repositories\CategoryRepository::class)
            @foreach($categoryRepository->root() as $category)
                <a class="mx-4 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400 hover:underline md:my-0"
                   href="{{ $category->url }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</nav>
