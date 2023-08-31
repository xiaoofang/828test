@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">工作管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">文章一覽表</li>
        </ol>
        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
            <strong>完成！</strong> 成功儲存文章
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

            <form class="d-flex mt-3 mb-3" action="{{ route('admin.posts.index') }}" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
                <button id="searchUserBtn" class="btn btn-secondary btn-sm">
                    按使用者排序
                    @if ($sortBy === 'name')
                        @if ($sortOrder === 'asc')
                            ▲
                        @else
                            ▼
                        @endif
                    @endif
                </button>
                <button id="searchTitleBtn" class="btn btn-secondary btn-sm">
                    按標題排序
                    @if ($sortBy === 'title')
                        @if ($sortOrder === 'asc')
                            ▲
                        @else
                            ▼
                        @endif
                    @endif
                </button>
                <button id="searchTimeBtn" class="btn btn-secondary btn-sm">
                    按上傳時間排序
                    @if ($sortBy === 'time')
                        @if ($sortOrder === 'asc')
                            ▲
                        @else
                            ▼
                        @endif
                    @endif
                </button>
            </form>


        <table class="table">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">使用者</th>
                <th scope="col">標題</th>
                <th scope="col">上傳時間</th>
                <th scope="col">功能</th>
            </tr>
            </thead>
            <tbody>
            @if ($posts->isEmpty())
                <tr>
                    <td colspan="5">沒有符合條件的文章。</td>
                </tr>
            @else
                @foreach($posts as $post)
                    <tr>
                        <th scope="row" style="width: 50px">{{ $post->id }}</th>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td style="width: 150px">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post->id) }}">編輯</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" style="display: inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
