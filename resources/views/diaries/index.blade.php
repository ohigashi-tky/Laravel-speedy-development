@extends('adminlte::page')

@section('title', '日記')

@section('content_header')
    <h1>日記</h1>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">日記一覧</h3>
        <div class="ml-auto">
            <a href="{{ route('diary.create') }}" class="btn btn-primary">
                <i class="fas fa-pencil-alt"></i> 日記を書く
            </a>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th style="width: 10%;">日付</th>
                    <th style="width: 50%;">内容</th>
                    <th style="width: 30%;">画像</th>
                    <th style="width: 10%;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($diaries as $diary)
                    <tr>
                        <td>{{ $diary->created_at->format('Y-m-d') }}</td>
                        <td>{{ $diary->content }}</td>
                        <td>
                            @if($diary->image_path)
                                <img src="{{ asset('storage/' . $diary->image_path) }}" alt="Image" style="width: 200px; height: auto;">
                            @else
                                <span>No image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('diary.edit', $diary->id) }}" class="btn btn-primary m-2">
                                <i class="fas fa-pencil-alt"></i>編集
                            </a>
                            </br>
                            <a href="{{ route('diary.destroy', $diary->id) }}" class="btn btn-danger m-2"
                                onclick="event.preventDefault(); if (confirm('削除しますか？')) { document.getElementById('delete-form-{{ $diary->id }}').submit(); }">
                                <i class="fas fa-trash"></i>削除
                            </a>
                            <form id="delete-form-{{ $diary->id }}" action="{{ route('diary.destroy', $diary->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- ページネーション -->
        <div class="card-footer clearfix">
            {{ $diaries->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
