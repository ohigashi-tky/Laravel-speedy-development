@extends('adminlte::page')

@section('title', '日記を書く')

@section('content_header')
    <h1>日記を書く</h1>
@stop

@section('content')
    <form action="{{ route('diary.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="content">内容</label>
            <textarea name="content" id="content" class="form-control" rows="1" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">画像</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">登録</button>
        <a href="{{ route('diary.index') }}" class="btn btn-secondary">戻る</a>
    </form>
@stop
