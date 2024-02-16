@extends('layouts.master')
@section('title')
    Thêm bài viết
@endsection
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto  sm:rounded-lg">
            <h1 class="text-3xl text-blue-600 text-center font-bold py-2">
                Form thêm bài viết
            </h1>
            <form action="" class="max-w-sm mx-auto" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    @if (!empty($_SESSION['success']))
                        <div class="alert alert-success">
                            {{ $_SESSION['success'] }}
                        </div>

                        @php
                            $_SESSION['success'] = null;
                        @endphp
                    @endif
                </div>
                <div class="mb-3">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="PostsTitle" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nhập tiểu đề" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" name="image" id="image" class="" required>
                </div>
                <div class="mb-3">
                    <label for="cate">Danh mục</label>
                    <select name="cate" id="cate">
                        @foreach ($data as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="mb-3">
                    <label for="content"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea id="content" name="Content" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nhập nội dung"></textarea>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm</button>
                <a href="/admin/posts"
                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Quay
                    lại</a>
            </form>
        </div>
    </div>
@endsection
