@extends('blog::layouts.default')
@section('body')
    <div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">注册</h1>
                    <p class="text-gray-500 dark:text-gray-400">注册一个账号以继续访问</p>
                </div>
                @if($setting->fetch('allow_register'))
                    <div class="m-7">
                        <form action="">
                            <div class="mb-6">
                                <label for="email"
                                       class="block mb-2 text-sm text-gray-600 dark:text-gray-400">邮箱</label>
                                <input type="email" name="email" id="email" placeholder="abc@company.com"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-400">密码</label>
                                </div>
                                <input type="password" name="password" id="password" placeholder="请输入密码"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-400">确认密码</label>
                                </div>
                                <input type="password" name="password" id="password" placeholder="请重新输入密码"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>
                            <div class="mb-6">
                                <button type="button"
                                        class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                                    注册
                                </button>
                            </div>
                            <p class="text-sm text-center text-gray-400">已有帐号？ <a href="#!"
                                                                                  class="text-indigo-400 focus:outline-none focus:underline focus:text-indigo-500 dark:focus:border-indigo-800">登录</a>.
                            </p>
                        </form>
                    </div>
                @else

                @endif
            </div>
        </div>
    </div>
@endsection