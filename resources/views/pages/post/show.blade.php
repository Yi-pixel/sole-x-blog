@extends('layouts.default')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ mix('css/markdown-theme/light.css') }}">
    @endpush
    <div class="bg-gray-200 md:py-5 min-h-screen dark:bg-transparent md:grid md:grid-cols-12">
        <div class="max-w-screen-xl md:col-span-7 md:col-start-2 bg-white dark:bg-gray-800">
            <section
                    class="brade-crumbs flex text-gray-200 sm:my-5 sm:py-3 my-5 px-5 dark:border-b dark:border-gray-700 dark:text-blue-800">
                <div class="inline-flex">
                    <span class="ri-home-2-line items-center mr-1 text-gray-500 dark:text-blue-800"></span>
                    <a href="/" class="text-gray-500 hover:text-gray-600">首页</a>
                </div>
                <div class="mx-3">/</div>
                <div><a class="text-gray-500 hover:text-gray-600"
                        href="{{ $post['category']['url']??'' }}">{{ $post['category']['name'] }}</a></div>
                <div class="mx-3 hidden sm:inline-block">/</div>
            </section>
            <div class="post__header border-b border-dashed px-5 dark:border-gray-600">
                <div class="post__title text-2xl sm:text-4xl font-bold text-gray-700 pb-5 sm:pb-8 dark:text-gray-200">{{ $post['title'] }}</div>
                <section class="py-2 text-gray-500 flex-col sm:flex-row text-sm pb-5">
                    @php
                        $publishAt = \Illuminate\Support\Carbon::parse($post['created_at'] ?? 'now');
                    @endphp
                    <div class="flex sm:inline-flex items-center mr-5"
                         x-data="{ iso: '{{ $publishAt->toIso8601String() }}', short: '{{ $publishAt->shortRelativeToNowDiffForHumans() }}',show: '{{ $publishAt->shortRelativeToNowDiffForHumans() }}' }"
                         title="{{ $publishAt->toIso8601String() }}">
                        <span class="ri-calendar-2-fill mr-2"></span><span x-text="show" @click="show = iso"></span>
                    </div>
                    <div class="flex sm:inline-flex items-center mr-5" title="查看作者主页">
                        <span class="ri-user-location-line mr-2"></span>{{ $post['user']['name'] }}
                    </div>
                    <div class="flex sm:inline-flex items-center mr-5" title="浏览次数">
                        <span class="ri-eye-line mr-2"></span><span
                                class="mx-1">{{ $post['views'] ?: 0 }}</span>人
                    </div>
                    <div class="flex sm:inline-flex items-center mr-5" title="评论数">
                        <span class="ri-discuss-line mr-2"></span><span
                                class="mx-1">{{ $post['comment_count'] ?: 0 }}</span>人
                    </div>
                </section>
            </div>
            <section class="post__content markdown-body m-5">
                @markdown($post['content'])
            </section>
        </div>
    </div>
@endsection
