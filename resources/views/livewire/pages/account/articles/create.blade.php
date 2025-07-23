<div class="max-w-3xl mx-auto py-10">
    <x-page-heading
        :title="__('Create Article')"
        :description="__('Write a new article to share your thoughts.')"
    />

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data" class="space-y-6 mt-6">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                   value="{{ old('title') }}">
        </div>

        <div>
            <label for="featured_image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="featured_image" id="featured_image"
                   class="mt-1 block w-full border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="6" required
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content') }}</textarea>
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                Publish
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        tinymce.init({
            selector: '#content',
            height: 400,
            menubar: true,
            plugins: 'paste importcss lists link image preview table code',
            toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code preview',
            paste_data_images: true,
            paste_as_text: false,
            branding: false,

            paste_enable_default_filters: false,
            paste_word_valid_elements: 'b,strong,i,em,h1,h2,h3,h4,h5,h6,table,tr,td,th,ul,ol,li,br,p,span',
        });
    });
</script>
