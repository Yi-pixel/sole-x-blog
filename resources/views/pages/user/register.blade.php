@extends('blog::layouts.default')
@section('content')
    <div class="flex items-center min-h-screen bg-white md:bg-gray-200 bg-white">
        <div class="container mx-auto md:w-1/2 md:bg-white md:rounded-md rounded-none max-w-screen-sm">
            <div class="max-w-md mx-auto my-10">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">注册</h1>
                    <p class="text-gray-500 dark:text-gray-400">注册一个账号以继续访问</p>
                </div>
                @if($errors->any())
                    <div class="bg-red-100 p-5 w-full">
                        <div class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="flex-none fill-current text-red-500 h-4 w-4">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/>
                            </svg>
                            <div class="leading-tight flex flex-col space-y-2">
                                <div class="text-sm font-medium text-red-700">你必须解决以下错误:</div>
                                @foreach($errors->all() as $error)
                                    <div class="flex-1 leading-snug text-sm text-red-600">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if(\SoleX\Blog\App\Enums\SettingKeys::AllowRegister->fetch(false)->isTrue())
                    <div class="m-7">
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="mb-6">
                                <label for="email"
                                       class="block mb-2 text-sm text-gray-600 dark:text-gray-400">邮箱</label>
                                <input type="email" name="email" required id="email" placeholder="abc@company.com"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-400">密码</label>
                                </div>
                                <input type="password" name="password" required id="password" placeholder="请输入密码"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 dark:text-gray-400">确认密码</label>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                       placeholder="请重新输入密码"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                            </div>
                            <div class="mb-6">
                                <button type="submit"
                                        class="w-full p-2.5 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">
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
