<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {
    protected $guarded = array('id');

    //FormRequestを使うため下記のコードは削除します。
    // public static $rules = array(
    //     'content' => 'required',
    //     'status' => 'required'
    // );
}
