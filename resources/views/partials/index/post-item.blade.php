@php
    use Illuminate\Support\Carbon;
    $publishAt = Carbon::parse($post['created_at'] ?: 'now')
@endphp
<div class="bg-white sm:rounded-lg shadow-sm hover:shadow-lg duration-500 px-2 sm:px-6 md:px-2 py-4 my-6 cursor-pointer dark:bg-gray-900">
    <div class="grid grid-cols-12 gap-3">
        <!-- Meta Column -->
        <div class="col-span-0 sm:col-span-2 text-center hidden sm:block dark:text-gray-400 {{ $post['cover'] ? 'pl-2':'' }}">
            @if($post['cover'])
                <img class="rounded-md"
                     src="{{ $post['cover']['url'] }}"
                     alt="">
            @else

                <!-- Vote Counts -->
                <div class="grid grid-rows-2">
                    <div class="inline-block font-medium text-xl">
                        {{ $post['comment_count'] ?? 0 }}
                    </div>

                    <div class="inline-block font-medium text-sm">
                        讨论
                    </div>
                </div>

                <!-- Answer Counts -->
                <a href="#"
                   class="grid grid-rows-2 mx-auto mb-3 py-1 w-4/5 2lg:w-3/5 rounded-md bg-gray-500">
                    <div class="inline-block font-medium text-2xl text-white">
                        {{ $publishAt->day }}
                    </div>

                    <div class="inline-block font-medium text-white mx-1 text-sm lg:text-md">
                        {{ $publishAt->shortEnglishMonth }}
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
                        {{ $post['views'] }}
                    </span>
                </div>

            @endif
        </div>

        <!-- Summary Column -->
        <div class="col-span-12 sm:col-start-3 sm:col-end-13 px-3 sm:px-0">
            <div class="justify-between items-center hidden sm:flex">
                <span class="font-light text-gray-400 text-sm">{{ $publishAt->shortRelativeToNowDiffForHumans() }}</span>
                <span class="ri-more-2-line text-gray-300 hover:text-gray-600 px-5"></span>
            </div>

            <div class="mt-2">
                <a href="{{ route('blog.post.view', $post['id']) }}"
                   title="按住 Ctrl 单击可以在新窗口中继续浏览 “{{ $post['title'] }}”"
                   class="sm:text-sm md:text-md lg:text-lg text-gray-700 font-bold hover:underline dark:text-gray-200">{{ $post['title'] }}</a>
                <p class="mt-2 text-gray-500 text-sm md:text-md">{{ strip_tags(mb_substr($post['content'], 0, 200)) }}
                    ...</p>
            </div>

            <!-- Question Labels -->
            <div class="grid grid-cols-2 mt-4 my-auto">
                <!-- Categories  -->
                @if($post['tags'])
                    <div class="col-span-12 lg:col-span-8">
                        <svg class="w-5 inline transform rotate-90 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        @each('partials.index.post-item-tag', $post['tags'] ?? [],'tag')
                    </div>
                @endif

                <!-- User -->
                <div class="col-none hidden mr-2 lg:block lg:col-start-9 lg:col-end-12">
                    <a href="#" class="flex items-center" title="查看主页">
                        <img src="{{ $post['user']['avatar']['url'] ?? '' }}"
                             onerror="this.src='http://q1.qlogo.cn/g?b=qq&nk=721796631&s=640'"
                             alt="avatar"
                             class="mr-2 w-8 h-8 rounded-full">

                        <div class="text-gray-600 font-bold text-sm hover:underline">
                            {{ $post['user']['name'] ?? '' }}
                        </div>
                    </a>
                </div>
            </div>
            @if($post['cover'])
                <div class="mt-2 my-auto flex space-x-8 text-sm text-gray-500">
                    <div class="flex align-middle">
                        <span class="ri-calendar-line mr-1.5"></span>
                        <span>{{ $publishAt->format('Y/m/d H:i') }}</span>
                    </div>
                    <div class="flex align-middle">
                        <span class="ri-eye-line mr-1.5"></span>
                        {{ $post['views'] }}<span class="hidden md:block ml-1.5">查看</span>
                    </div>
                    <div class="flex align-middle">
                        <span class="ri-chat-1-line mr-1.5"></span>
                        {{ $post['comment_count'] ?: 0 }}<span class="hidden md:block ml-1.5">评论</span>
                    </div>
                    <div class="flex align-middle">
                        <span class="ri-thumb-up-line mr-1.5"></span>
                        {{ $post['comment_count'] ?: 0 }}<span class="hidden md:block ml-1.5">赞</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
