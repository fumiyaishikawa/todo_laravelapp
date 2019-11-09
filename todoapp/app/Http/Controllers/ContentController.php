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

    // タスク登録アクション(add & create)
    // public function create(Request $request) { //削除予定です
    public function create(ContentRequest $request) {
        // $this->validate($request, Content::$rules); //削除予定です
        $content = new Content;
        $form = $request->all();
        unset($form['_token']);
        $content->fill($form)->save();
        return redirect('/todo');
    }
}
