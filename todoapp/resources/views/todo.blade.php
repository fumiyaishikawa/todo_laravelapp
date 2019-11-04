@extends('layouts.parent')

{{-- TitleとH2 --}}
@section('title', 'Todoリスト')

{{-- 個別ページの内容 --}}
@section('content')
@foreach($items as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->content }}</td>
    <td><a href="/todo">{{ $item->status }}</a></td>
    <td><a href="/todo">削除</a></td>
</tr>
@endforeach
@endsection

@section('error')
@if(count($errors) > 0)
<div>
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif
@endsection
