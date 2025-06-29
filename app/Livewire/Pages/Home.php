<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.templates.app')]
class Home extends Component
{
    public function render(): View
    {
        if (request()->has('clickid')) {
            cookie()->queue(cookie('clickid', request()->clickid, 60 * 24 * 7));
        }

        return view('livewire.pages.home', [
            'products' => Product::with([
                'brand',
                'media',
                'prices' => function ($query) {
                    $query->whereRelation('currency', 'code', current_currency());
                },
                'prices.currency',
            ])
                ->withCount('variants')
                ->publish()
                ->get(),
            'collections' => Collection::with(['media'])
                ->select('id', 'slug', 'name')
                ->scopes('manual')
                ->take(3)
                ->get(),
            'categories' => Category::with(['media'])
            ->select('id', 'slug', 'name')
            ->where('parent_id', null)
            ->get(),
        ]);
    }
}
