<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
<div class="max-w-3xl mx-auto py-10">
    <x-page-heading
        :title="__('Edit Article')"
        :description="__('Update your article content and image.')"
    />

    <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data" class="space-y-6 mt-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                   value="{{ old('title', $article->title) }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Current Image</label>
            @if($article->featured_image)
                <img src="{{ $article->featured_image_url }}" alt="Article image" class="h-24 w-24 rounded-md object-cover mt-2">
            @else
                <p class="text-gray-500 text-sm mt-1">No image uploaded.</p>
            @endif
        </div>

        <div>
            <label for="featured_image" class="block text-sm font-medium text-gray-700">Change Image</label>
            <input type="file" name="featured_image" id="featured_image"
                   class="mt-1 block w-full border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="6" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content', $article->content) }}</textarea>
        </div>

        <script>
            tinymce.init({ selector: '#content', height: 300 });
        </script>

        <div class="pt-4">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
