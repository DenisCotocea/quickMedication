<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

#[Layout('components.layouts.templates.app')]
class CategoryPage extends Component
{
    public ?Category $category = null;
    public Collection $products;

    public function mount(int $id): void
    {
        $category = Category::with([
            'media'])
            ->where('id', $id)
            ->first();

        $this->category = $category;
        $this->products = $category->products()->publish()->get();
    }

    public function render(): View
    {
        return view('livewire.pages.category-page')
            ->title($this->category->name);
    }
}
