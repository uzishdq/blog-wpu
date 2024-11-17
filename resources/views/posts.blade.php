<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  <div class="py-4 px-4 max-w-screen-xl lg:py-8 lg:px-0">
    <div class="mx-auto max-w-screen-md sm:text-center">
      <form action="/posts" method="GET">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @elseif(request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
          <div class="relative w-full">
            <label for="search"
              class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                  d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input
              class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
              placeholder="Search for article" type="search" id="search" name="search" autocomplete="off" required>
          </div>
          <div>
            <button type="submit"
              class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
    @if ($posts->count() > 0)
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
          <article
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
              <a href="/posts?category={{ $post->category->slug }}" class="hover:underline">
                <span class="text-sm">{{ $post->category->name }}</span></a>
              <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post->body, 100) }}
            </p>
            <div class="flex justify-between items-center">
              <div class="flex items-center space-x-4">
                <a href="/posts?author={{ $post->author->id }}" class="hover:underline"> <span
                    class="font-medium dark:text-white">
                    {{ $post->author->name }}
                  </span></a>
              </div>
              <a href="/posts/{{ $post->slug }}"
                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                Read more
                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </article>
        @endforeach
      </div>
      <div class="py-4">
        {{ $posts->links() }}
      </div>
    @else
      <div class="mx-auto max-w-screen-md sm:text-center">
        <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl dark:text-white">Article Not
          Found</h2>
        <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400 text-justify">
          We couldn't find the article you're looking for. Please make sure the keywords entered are correct or try
          using different keywords for your search.
        </p>
        <a href="/posts"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Back to Posts</a>
      </div>
    @endif
  </div>
</x-layout>
