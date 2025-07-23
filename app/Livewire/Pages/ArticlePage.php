<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

#[Layout('components.layouts.templates.app')]
class ArticlePage extends Component
{
    public Collection $articles;

    public function mount(): void
    {
        $this->articles = Article::all();
    }

    public function render(): View
    {
        return view('livewire.pages.article.articles-page')
            ->title('Articles');
    }
}
