<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    <form class="max-w-xl mx-auto mb-5" method="GET" action="/post">

        @if (request('author'))
            <input type="hidden" name="author" value="{{request('author')}}">
        @endif

        @if (request('category'))
            <input type="hidden" name="category" value="{{request('category')}}">
        @endif

        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="title" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Articles..." />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    {{$posts->links()}}

    <div class="grid gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
    @forelse ($posts as $post)

        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
                <a href="/post?category={{$post->category->slug}}">
                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        {{$post->category->name}}
                    </span>
                </a>
                <span class="text-sm">{{$post->created_at->diffForHumans()}}</span>
            </div>
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline"><a href="post/{{$post->slug}}">{{$post->title}}</a></h2>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{Str::limit($post->body, 100)}}</p>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                    <a href="/post/?author={{$post->author->email}}">
                        <span class="font-medium dark:text-white">
                            {{$post->author->name}}
                        </span>
                    </a>
                </div>
                <a href="/post/{{$post->slug}}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                    Read more
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </article>

    @empty
        <div class="max-w-xl mx-auto mb-5">
           <p>Article not found...</p>
           <a href="/post" class="hover:underline inline text-primary-600">&laquo;Back?</a>
        </div>
    @endforelse
    </div>

    {{$posts->links()}}

</x-layout>
