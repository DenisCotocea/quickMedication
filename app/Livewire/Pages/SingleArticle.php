<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.templates.app')]
class SingleArticle extends Component
{
    public ?Article $article = null;

    public function mount(string $id): void
    {
        $article = Article::where('id', $id)->first();
        $this->article = $article;
    }

    public function render(): View
    {
        return view('livewire.pages.article.show')
            ->title($this->article->title);
    }
}
