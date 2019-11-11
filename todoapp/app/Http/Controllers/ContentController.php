<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;

class ContentController extends Controller {
    // Contentsテーブルの読み込みアクション
    public function index(Request $request) {
        $items = Content::all();
        return view('todo', ['items' => $items]);
    }

    // タスク登録アクション(createのみ)
    public function create(ContentRequest $request) {
        $content = new Content;
        $form = $request->all();
        unset($form['_token']);
        $content->fill($form)->save();
        return redirect('/todo');
    }

    //タスクの削除アクション(removeのみ)
    public function remove(Request $request) {
        Content::find($request->id)->delete();
        return redirect('/todo');
    }
}
