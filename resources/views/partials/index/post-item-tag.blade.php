<a href="{{ \SoleX\Blog\Utils\Helper::url('/tags/' . $tag['name']) }}" title="浏览更多内容" class="inline-block rounded-full text-white
        {{ $tag['color'] ?: 'bg-red-400' }} duration-300
        text-xs
        mr-1 md:mr-2 px-2 md:px-4 py-1
        opacity-90 hover:opacity-100">
    {{ $tag['name'] }}
</a>
