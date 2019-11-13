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

    //タスクの更新アクション(upadateのみ)
    public function update(Request $request) {
        $content = Content::find($request->id);

        // status情報を検証し置換する
        if($content->status == '作業中') {
            $content->status = '完了';
        } else {
            $content->status = '作業中';
        }
        unset($content['_token']);
        $content->save();
        return redirect('/todo');
    }

}
