@extends('blog::layouts.default')
@section('content')
    <div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">后台管理</h1>
                    <p class="text-gray-500 dark:text-gray-400">需要验证你的身份才能继续</p>
                </div>
                <div class="m-7">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-400">管理密码</label>
                            </div>
                            <input type="password" name="password" id="password" placeholder="请输入管理密码"
                                   class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                        </div>

                        <div class="mb-6">
                            <button type="submit"
                                    class="w-full px-3 py-3 text-white bg-blue-400 rounded-md focus:bg-indigo-600 focus:outline-none">
                                进入
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection