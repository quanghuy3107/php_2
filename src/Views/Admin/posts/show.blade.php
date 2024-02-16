@extends('layouts.master')
@section('title')
    Trang bài viết
@endsection
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="text-3xl text-blue-600 text-center font-bold py-2">
                Danh sách bài viết
            </h1>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center  h-24">
                    <a href="/admin/posts/create" class="btn btn-primary">Thêm bài viết</a>
                </div>

            </div>

            @if (!empty($_SESSION['success']))
                <div class="alert alert-success">
                    {{ $_SESSION['success'] }}
                </div>

                @php
                    $_SESSION['success'] = null;
                @endphp
            @endif
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Tiêu đề
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ảnh
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Người viết
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Danh mục
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                                <td class="px-6 py-4">
                                    <img src="{{ $value['image'] }}" alt="" width="100%">
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $value['title'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $value['username'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $value['name'] }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/admin/posts/update/{{ $value['postsid'] }}"
                                        class="btn btn-warning form-control">Edit</a>
                                    <a href="/admin/posts/delete/{{ $value['postsid'] }}"
                                        class="btn btn-danger form-control"
                                        onclick="confirm('Bạn có chắc chắn muốn xóa bài viết này không?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
