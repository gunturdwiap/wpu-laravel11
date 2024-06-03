<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/post/{{ $post['slug'] }}">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 hover:underline">{{ $post['title'] }}</h2>
            </a>
            <div class="text-gray-500 text-base">
                <a class="hover:underline" href="/author/{{ $post->author->id }}">By {{ $post->author->name }} </a> in <a class="hover:underline" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>| {{$post->created_at->diffForHumans()}}

            </div>
            <p class="my-4 font-light">{{ Str::limit($post['body'], 100, '...') }}</p>
            <a href="/post/{{ $post['slug'] }}" class="text-blue-500 font-medium hover:underline">Read more &raquo;</a>
        </article>
    @endforeach
    
</x-layout>