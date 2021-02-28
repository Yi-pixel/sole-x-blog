@extends('blog::layouts.default')
@section('content')
    <div class="flex items-center min-h-screen bg-white md:bg-gray-200 bg-white">
        <div class="container mx-auto md:w-1/2 md:bg-white md:rounded-md rounded-none max-w-screen-sm">
            <div class="max-w-md mx-auto my-10">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">登 录</h1>
                    <p class="text-gray-500 dark:text-gray-400">登录后以继续访问</p>
                </div>
                <div class="m-7">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">邮箱:
                                <span class="text-red-600">@error('email') {{ $errors->first('email') }} @enderror</span>
                            </label>
                            <input type="email" name="email" id="email" placeholder="abc@company.com"
                                   class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                        </div>
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-400">密码</label>
                                <a href="#!"
                                   class="text-sm text-gray-400 focus:outline-none focus:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-300">忘记密码？</a>
                            </div>
                            <input type="password" name="password" id="password" placeholder="密码"
                                   class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                        </div>

                        <div class="mb-6">
                            <label for="remember" class="text-sm text-gray-600 dark:text-gray-400"><input
                                        type="checkbox" name="remember" id="remember"/> 保存登录</label>
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                    class="w-full p-2.5 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
                                登录
                            </button>
                        </div>
                        <p class="text-sm text-center text-gray-400">你还没有账号？赶紧 <a href="#!"
                                                                                  class="text-indigo-400 focus:outline-none focus:underline focus:text-indigo-500 dark:focus:border-indigo-800">注册</a>
                            一个吧。
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection