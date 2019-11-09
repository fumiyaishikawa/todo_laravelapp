@extends('layouts.parent')

{{-- TitleとH2 --}}
@section('title', 'Todoリスト')

{{-- 個別ページの内容 --}}
@section('content')
@foreach($items as $item)
<tr>
    <td scope="row" class="text-center">{{ $item->id }}</td>
    <td class="text-center">{{ $item->content }}</td>
    <td class="text-center"><a href="/todo" class="btn btn-dark text-white bg-dark">{{ $item->status }}</a></td>
    <td class="text-center"><a href="/todo" class="btn btn-dark text-white bg-dark">削除</a></td>
</tr>
@endforeach
@endsection

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
