<div class="space-y-10">
    <x-page-heading
        :title="__('Articles')"
        :description="__('View and post your articles here.')"
    />

    <div class="flex justify-end">
        <a href="{{ route('articles.create') }}"
           class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700">
            + Create Article
        </a>
    </div>

    <div class="space-y-8">
        @if($articles->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 shadow rounded-lg">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Id</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Title</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Image</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Published</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Content</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach($articles as $article)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $article->id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $article->title }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ $article->featured_image_url }}" alt="Image" class="h-12 w-12 object-cover rounded-md">
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600">
                                {{ $article->published_at ? $article->published_at->format('Y-m-d') : 'Draft' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600">
                                {{ $article->content}}
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('articles.edit', $article) }}"
                                   class="inline-flex items-center px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-sm text-gray-500">
                {{ __('You have not yet added any articles.') }}
            </p>
        @endif
    </div>
</div>
