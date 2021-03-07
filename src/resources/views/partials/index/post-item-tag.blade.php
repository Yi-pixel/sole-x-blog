<a href="{{ \SoleX\Blog\App\Utils\Helper::url('/tags/' . $tag['name']) }}" class="inline-block rounded-full text-white
        {{ $tag['color'] ?: 'bg-red-400' }} duration-300
        text-xs
        mr-1 md:mr-2 mb-2 px-2 md:px-4 py-1
        opacity-90 hover:opacity-100">
    {{ $tag['name'] }}
</a>
