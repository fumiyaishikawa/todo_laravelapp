<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <h2>@yield('title')</h2>

    <section>
        <!-- 表示するタスクの切り替えをする。JS? /formいらないかも-->
        <!-- <div class="checkbox">
            <form action="/home" method="post">
            {{ csrf_field() }} -->
                <label><input type="radio" name="radio" value="すべて" checked>すべて</label>
                <label><input type="radio" name="radio" value="作業中">作業中</label>
                <label><input type="radio" name="radio" value="完了">完了</label>
            <!-- </form> -->
        </div>

        <!-- 登録したタスク一覧 -->
        <table>
            <tr>
                <th>ID</th>
                <th>コメント</th>
                <th>状態</th>
                <th></th>
            </tr>
            <!-- contentsテーブルに登録されているデータを展開する -->
            @yield('content')
        </table>

        <!-- タスクの追加 -->
        <div class="taskbox">
            <h2>新規タスクの追加</h2>
            <form action="/todo" method="post">
            {{ csrf_field() }}
                <input type="text" name="content" value="{{ old('content') }}">
                <input type="hidden" name="status" value="作業中">
                <button type="submit">追加</button>
            </form>
        </div>

        <!-- タスクを登録する際のエラー文 -->
        @yield('error')
    </section>

</body>
</html>
