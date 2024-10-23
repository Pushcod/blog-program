<?php

namespace App\Livewire\Articles;

use Livewire\Attributes\Url;
use Livewire\Component;

class ArticlesSort extends Component
{
    #[Url()]
    public $ArticlesSort = "asc";

    public function setArticlesSort($ArticlesSort) 
    {
        $this->ArticlesSort = $ArticlesSort;
        $this->dispatch('ArticlesSort', ArticlesSort: $this->ArticlesSort);
    }

    public function render()
    {
        return view('livewire.articles.articles-sort');
    }
}
