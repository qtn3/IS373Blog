<x-guest-layout>
    <!--$posts is came from app/Http/Controllers/PostController.php-->
    @foreach ($posts as $post)
        <div class="border border-black mb-2">
            <h1 class="text-2xl">{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <!--public_posts_show is a route name in routes/web.php. When the user click on view, it will trigger the link public_posts_show
            and generate the $post->id which is used in postview.blade.php-->
            <a class="hover:underline" href="{{route('public_posts_show', $post->id)}}">View</a>
        </div>
    @endforeach
</x-guest-layout>
