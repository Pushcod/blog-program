<div class="">
    @forelse ($articles as $article)
    <x-article-card :data="$article" />
    @empty
    <h1>Записи нема</h1> 
    @endforelse
</div>