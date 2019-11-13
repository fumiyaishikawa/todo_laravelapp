@extends('layouts.parent')

{{-- TitleとH2 --}}
@section('title', 'Todoリスト')

{{-- 個別ページの内容 --}}
@section('content')

<!-- 登録したタスク一覧 -->
<table class="table table-striped mt-3">
    <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">コメント</th>
        <th scope="col" class="text-center">状態</th>
        <th scope="col" class="text-center"></th>
    </tr>
@foreach($items as $item)
    <tr>
        <td scope="row" class="text-center">{{ $loop->iteration }}</td>
        <td class="text-center">{{ $item->content }}</td>

        <!-- 状態の切り替え機能 -->
        <form action="/todo/update" method="post">
        {{ csrf_field() }}
            <td class="text-center">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <input class="btn btn-dark text-white bg-dark" type="submit" value="{{ $item->status }}">
            </td>
        </form>

        <!-- タスクの削除機能 -->
        <form action="/todo/delete" method="post">
        {{ csrf_field() }}
            <td class="text-center">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <input class="btn btn-dark text-white bg-dark" type="submit" value="削除">
            </td>
        </form>
    </tr>
@endforeach
</table>
@endsection

{{-- エラー文の内容 --}}
@section('error')
@if(count($errors))
<div class="mt-3">
    <ul>
    @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif
@endsection
