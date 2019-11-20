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
        if($content->status === '1') {
            $content->status = '2';
        } else {
            $content->status = '1';
        }
        unset($content['_token']);
        $content->save();
        return redirect('/todo');
    }

    //タスクの検索アクション
    public function search(Request $request) {
        if($request->radio === '1') {
            $items = Content::statusSearch($request->radio)->get();
        } elseif($request->radio === '2') {
            $items = Content::statusSearch($request->radio)->get();
        } else { //allの場合
            $items = Content::all();
        }
        return view('todo', ['items' => $items]);
    }
}
