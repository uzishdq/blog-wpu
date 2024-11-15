<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article
        class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
        <header class="mb-4 lg:mb-6 not-format">
          <a href="/posts" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Back to posts</a>
          <address class="flex items-center mb-6 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
              <div>
                <a href="/author/{{ $post->author->id }}" rel="author"
                  class="text-xl font-bold text-gray-900 dark:text-white hover:underline">{{ $post->author->name }}</a>
                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                    title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}</time></p>
              </div>
            </div>
          </address>
          <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
            {{ $post->title }}</h1>
        </header>
        <p class="text-justify">{{ $post->body }}</p>
      </article>
    </div>
  </main>

</x-layout>
