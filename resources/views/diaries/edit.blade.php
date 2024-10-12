@extends('adminlte::page')

@section('title', '日記を編集する')

@section('content_header')
    <h1>日記を編集する</h1>
@stop

@section('content')
    <form action="{{ route('diary.update', $diary->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="content">内容</label>
            <textarea name="content" id="content" class="form-control" rows="1" required>{{ $diary->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">画像</label>
            @if($diary->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $diary->image_path) }}" alt="Current Image" style="width: 200px; height: auto;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('diary.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
@stop
