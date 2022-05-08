@extends('layouts.default')
@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ mix('css/markdown-theme/light.css') }}">
    @endpush
    @php($publishAt = \Illuminate\Support\Carbon::parse($post['created_at'] ?? 'now'))
    @php($updateAt = ($post['update_at'] ?: $publishAt))

    <div class="bg-gray-200 md:py-5 dark:bg-transparent md:grid md:grid-cols-12">
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
                <section class="text-gray-500 flex-col sm:flex-row text-sm py-3">
                    <div class="flex sm:inline-flex items-center mr-5"
                         x-data="{ iso: '{{ $publishAt->toIso8601String() }}', short: '{{ $publishAt->shortRelativeToNowDiffForHumans() }}',show: '{{ $publishAt->shortRelativeToNowDiffForHumans() }}' }"
                         title="{{ $publishAt->toIso8601String() }}">
                        <span class="ri-calendar-2-fill mr-2"></span><span class="cursor-pointer" x-text="show"
                                                                           @click="show = iso"></span>
                    </div>
                    <div class="flex sm:inline-flex items-center mr-5" title="@lang('查看作者主页')">
                        <span class="ri-user-location-line mr-2"></span>{{ $post['user']['name'] }}
                    </div>
                    <div class="flex sm:inline-flex items-center mr-5" title="@lang('浏览次数')">
                        <span class="ri-eye-line mr-2"></span><span
                                class="mx-1">{{ $post['views'] ?: 0 }}</span>人
                    </div>
                    <div class="flex sm:inline-flex items-center mr-5" title="@lang('评论数')">
                        <span class="ri-discuss-line mr-2"></span><span
                                class="mx-1">{{ $post['comment_count'] ?: 0 }}</span>人
                    </div>
                </section>
            </div>
            <section>
                <div class="flex items-center justify-between gap-4 p-4 border rounded text-amber-700 border-amber-900/10 bg-amber-50 m-3"
                     x-data="{show: true}"
                     x-show="show"
                     x-transition
                     role="alert">
                    <div class="flex items-center gap-4">
                        <span class="p-2 text-white rounded-full bg-amber-600">
                          <svg xmlns="http://www.w3.org/2000/svg"
                               class="w-5 h-5"
                               fill="none"
                               viewBox="0 0 24 24"
                               stroke="currentColor"
                               stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                          </svg>
                        </span>

                        <p>
                            <strong class="md:text-base font-medium font-bold text-sm">@lang('注意')</strong>

                            <span class="block md:text-sm opacity-90 mt-1 text-xs">本文最后更新于 {{ $updateAt->toDateString() }}, 可能已经失效，不再具有参考性。</span>
                        </p>
                    </div>

                    <button class="opacity-90" type="button" @click="show = false">
                        <span class="sr-only"> Close </span>

                        <svg class="w-4 h-4"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            </section>
            <section class="post__content markdown-body m-5">
                @markdown($post['content'])
            </section>
            <section class="post__footer px-5 my-5 border-t border-t-stone-100 border-dashed">
                @if($post['tags'])
                    <div class="mt-5">
                        <svg class="w-5 inline transform rotate-90 text-gray-500 mr-1" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        @each('partials.index.post-item-tag', $post['tags'] ?? [],'tag')
                    </div>
                @endif
                <div class="post__manage my-5 flex text-sm text-gray-600">
                    <div class="post__manage-summary cursor-pointer" title="{{ $updateAt->toIso8601String() }}">
                        @lang('最后更新'): {{ $updateAt?->toDateString() }}
                    </div>
                    @if(\SoleX\Blog\Enums\Abilities::SuperAdmin->can())
                        <div class="post__manage-operate ml-auto">
                            <a href="javascript:" class="mx hover:text-zinc-900">@lang('编辑')</a>
                            <a href="javascript:" class="mx hover:text-zinc-900">@lang('删除')</a>
                            <a href="javascript:" class="mx hover:text-zinc-900">@lang('历史版本')</a>
                        </div>
                    @endif
                </div>

                <div class="post__share">

                </div>
            </section>
        </div>
    </div>
@endsection
