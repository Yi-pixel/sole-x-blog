<!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

<footer class="bg-gray-900">
    <div class="grid max-w-screen-xl grid-cols-1 mx-auto lg:grid-cols-2">
        <div class="px-4 py-16 border-b border-gray-800 md:border-b-0 md:border-l lg:pl-12 lg:order-last">
            <div class="block lg:hidden">
                <span class="inline-flex justify-center items-center w-32 h-10 bg-gray-700 rounded-lg text-center text-white text-2xl">SOLE-X</span>
            </div>

            <div class="mt-12 space-y-4 lg:mt-0">
                <span class="block w-10 h-1 bg-indigo-500 rounded"></span>

                <div>
                    <h5 class="text-2xl font-medium text-white">
                        订阅本站
                    </h5>

                    <p class="max-w-xs mt-1 text-xs text-gray-500">
                        站内不定时会更新一些技术文章，你可以选择订阅本站，我们将会在文章发布时发送邮件给您。
                    </p>
                </div>

                <form>
                    <div class="relative max-w-lg">
                        <label class="sr-only" for="email"> 邮箱地址 </label>

                        <input class="w-full py-4 pl-3 pr-16 text-sm bg-gray-800 border-none rounded-lg" id="email"
                               type="email" placeholder="请输入您的邮箱地址" />

                        <button class="absolute p-3 text-white -translate-y-1/2 bg-blue-600 rounded-md top-1/2 right-1.5"
                                type="button">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="px-4 py-16 lg:pr-12">
            <div class="hidden lg:block">
                <span class="inline-flex justify-center items-center w-32 h-10 bg-gray-700 rounded-lg text-center text-white text-2xl">SOLE-X</span>
            </div>

            <div class="grid grid-cols-3 gap-8 lg:mt-12">
                <div>
                    <p class="font-bold text-white">
                        @lang('了解本站')
                    </p>

                    <nav class="flex flex-col mt-2 space-y-1 text-xs text-gray-400">
                        <a class="hover:opacity-75" href="">@lang('关于本站')</a>
                        <a class="hover:opacity-75" href="">@lang('与我联系')</a>
                        <a class="hover:opacity-75" href="">@lang('广告投放')</a>
                        <a class="hover:opacity-75" href="">@lang('RSS 订阅')</a>
                    </nav>
                </div>

                <div>
                    <p class="font-bold text-white">
                        @lang('站务服务')
                    </p>

                    <nav class="flex flex-col mt-2 space-y-1 text-xs text-gray-400">
                        <a class="hover:opacity-75" href="">@lang('原创投稿')</a>
                        <a class="hover:opacity-75" href="">@lang('侵权投诉')</a>
                        <a class="hover:opacity-75" href="">@lang('友链申请')</a>
                        <a class="hover:opacity-75" href="">@lang('站务日志')</a>
                    </nav>
                </div>

                <div>
                    <p class="font-bold text-white">
                        热门标签
                    </p>

                    <nav class="flex flex-col mt-2 space-y-1 text-xs text-gray-400">
                        <a class="hover:opacity-75" href="">Laravel</a>
                        <a class="hover:opacity-75" href="">PHP</a>
                        <a class="hover:opacity-75" href="">存档</a>
                        <a class="hover:opacity-75" href="">生活</a>
                    </nav>
                </div>
            </div>

            <div class="flex mt-12 space-x-6 text-xs text-white justify-center">
                <p>Copyright &copy; 2022 SOLE-X </p>
                {{--<a class="underline hover:opacity-75" href=""> Privacy Policy </a>
                <a class="underline hover:opacity-75" href=""> Terms & Conditions </a>
                <a class="underline hover:opacity-75" href=""> Cookies </a>--}}
            </div>
        </div>
    </div>
</footer>
