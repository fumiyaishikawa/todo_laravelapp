<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {
    protected $guarded = array('id');

    //フォームのstatusで送られた数字を文字列に変換する
    const STATUS = [
        1 => ['label' => '作業中'],
        2 => ['label' => '完了'],
    ];

    public function getStatusLabelAttribute() {
        //状態値
        $status = $this->attributes['status'];
        //定義されていなければから文字を返す
        if(!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
}
