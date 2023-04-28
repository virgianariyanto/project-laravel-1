@extends('dashboard.layouts.main_dashboard')

@section('container')
    <div>
        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" id="title" name="title" class="@error('title') border-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" autofocus value="{{ old('title') }}">
                @error('title') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug" class="@error('slug') border-red-500 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ old('slug') }}">
                @error('slug') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="mb-6">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($category as $cat )
                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
                <img alt="" class="img-preview w-60">
                <input onchange="previewImage()" class="@error('image') border-red-500 @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file">
                @error('image') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <div class="mb-6">      
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                <textarea id="message" rows="10" name="body" class="@error('body') border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{ old('body') }}</textarea>
                @error('body') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        function previewImage() {
            const img = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>
@endsection