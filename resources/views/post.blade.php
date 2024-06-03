<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

        <article class="py-8 max-w-screen-md border-gray-300">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            <div class="text-gray-500 text-base">
                <a class="hover:underline" href="/author/{{ $post->author->id }}">By {{ $post->author->name }} </a> in <a class="hover:underline" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>| {{$post->created_at->diffForHumans()}}
            </div>
            <p class="my-4 font-light">{{ $post['body'] }}</p>
            <a href="/post" class="text-blue-500 font-medium hover:underline"> &laquo; Back</a>
        </article>
    
</x-layout>