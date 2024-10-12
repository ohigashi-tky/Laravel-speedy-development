@extends('adminlte::page')

@section('title', '商品管理')

@section('content_header')
    <h1>商品管理</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">商品</h3>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>価格</th>
                    <th>更新日</th>
                    <th>登録日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id ?? '' }}</td>
                        <td>{{ $item->name ?? '' }}</td>
                        <td>{{ $item->price ? number_format($item->price) : '' }}</td>
                        <td>{{ $item->updated_at ?? '' }}</td>
                        <td>{{ $item->created_at ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
