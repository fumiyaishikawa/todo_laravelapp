<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="container mt-5">
        <h2 class="text-center bg-light py-3">@yield('title')</h2>
    </nav>

    <section class="container mt-5 mb-5">
        <!-- 表示するタスクの切り替えをする。JS?-->
        <form action="{{ route('todo.find') }}" method="post" class="checkbox text-center">
        {{ csrf_field() }}
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="all" checked>
                <label class="form-check-label" for="inlineRadio1">すべて</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio2">作業中</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="inlineRadio3" value="2">
                <label class="form-check-label" for="inlineRadio3">完了</label>
            </div>
            <div class="form-check form-check-inline">
                <button type="submit" class="btn btn-primary px-2 mb-2">タスクを検索</button>
            </div>
        </form>

        <!-- 登録したタスク一覧 -->
        @yield('content')

        <!-- タスクの追加 -->
        <div class="taskbox center-block mt-5">
            <h3 class="text-center bg-light py-3">新規タスクの追加</h3>
            <form action="{{ route('todo.add') }}" method="post" class="mt-4">
            {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" name="content" value="{{ old('content') }}" class="form-control mb-2">
                        <input type="hidden" name="status" value="1">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary px-4 mb-2">追加</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- タスクを登録する際のエラー文 -->
        @yield('error')
    </section>
</body>
</html>
