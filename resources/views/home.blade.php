<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="row p-3">
                            <div class="col">
                                <a href="{{ route('posts.index') }}" class="btn btn-primary">Blog</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-3 ">
                {{-- <input type="hidden" id="postUserId_" name="custId" value=""> --}}
                <div class="mb-3 w-50">
                    <label for="postTitle" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="postTitle">
                </div>
                <div class="mb-3 w-50">
                    <label for="postDescription" class="form-label">Description:</label>
                    <textarea class="form-control" id="postDescription" rows="3"></textarea>
                </div>
                {{-- <div class="mb-3 w-50">
                    <label for="formFile" class="form-label">Insert Image:</label>
                    <input class="form-control" type="file" id="formFile">
                </div> --}}
                <div class="">
                    <a href="#" class="btn btn-primary" id="postCreate">Create Post</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
</x-app-layout>
