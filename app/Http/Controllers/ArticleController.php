<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('livewire.pages.account.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('livewire.pages.account.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $article = new Article();
        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['title']);
        $article->content = $validated['content'];
        $article->author = auth()->user()->name ?? 'Admin';
        $article->published_at = now();

        if ($request->hasFile('featured_image')) {
            $article->featured_image = $request->file('featured_image')->store('uploads/articles', 'public');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('livewire.pages.account.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $article->title = $validated['title'];
        $article->slug = Str::slug($validated['title']);
        $article->content = $validated['content'];

        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $article->featured_image = $request->file('featured_image')->store('uploads/articles', 'public');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted.');
    }
}
