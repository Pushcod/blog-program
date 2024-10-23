@props(['data'])
<article class="post text-black">
    <header>
        <div class="title">
            <h2><a href="{{ route('page.single-article', $data->slug) }}">{{ $data->title }}</a></h2>
            <p><a href="{{ route('page.articles', $data->category_id) }}">{{ $data->category->name }}</a></p>
        </div>
        <div class="meta text-black">
            <time class="published" datetime="2015-11-01">{{ $data->created_at }}</time>
        </div>
    </header>
    <a href="{{ route('page.single-article', $data->slug) }}" class="max-w-[400px] object-contain image featured"><img alt="Изображение блога" src="{{ url('storage', $data->image) }}" alt="" /></a>
    <p>{{ $data->small_text }}</p>
    <div>
        <ul class="actions">
            <li><a href="{{ route('page.single-article', $data->slug) }}" class="button big">Продолжить чтение</a></li>
        </ul>
        <ul class="stats">
            <li><a href="#">{{ $data->tags }}</a></li>
        </ul>
    </div>
</article>