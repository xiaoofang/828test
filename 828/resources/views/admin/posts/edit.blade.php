@extends('admin.layouts.master')

@section('page-title', 'Edit article')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">編輯文章</li>
    </ol>
    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
        <strong>錯誤！</strong> 請修正以下問題：
        <ul>
            <li>錯誤 1</li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <form action="{{ route('admin.posts.update',$post->id) }}" method="post">

        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">使用者</label>
            <textarea id="name" name="name" type="text" class="form-control" placeholder="請輸入名字"></textarea>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">工作標題</label>
            <input title="title" name="title" type="text" class="form-control" placeholder="請輸入工作標題">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">文章內容</label>
            <textarea id="content" name="content" class="form-control" rows="10" placeholder="請輸入工作描述"></textarea>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
</div>
@endsection
