<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ArticlesList extends Component
{
    #[Url()]
    public $ArticlesSort = 'asc';

    #[On('ArticlesSort')]
    public function updateArticlesSort($ArticlesSort)
    {
        $this->ArticlesSort = $ArticlesSort;
        $this->render();
    }

    public $categoryId;
    
    #[Computed()]
    public function articles()
    {
        return Article::where('category_id', $this->categoryId)
            ->where('is_active', 1)
            ->orderBy('created_at', $this->ArticlesSort)
            ->get();
    }

    public function render()
    {
        return view('livewire.articles.articles-list', [
            'articles' => $this->articles(),
        ]);
    }
}
