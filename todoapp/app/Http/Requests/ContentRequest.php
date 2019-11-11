<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * /todoページでタスクを作成するときに使う
     * @return bool
     */
    public function authorize() {
        if($this->path() === 'todo/add') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'content' => 'required',
            'status' => 'required', //statusはhiddenを使用しデフォルトで入力しています
        ];
    }

    public function messages() {
        return [
            'content.required' => 'タスクは必ず入力してください。',
            'status.required' => '状態が設定されませんでした。もう一度タスクを作成してください。',
        ];
    }
}
