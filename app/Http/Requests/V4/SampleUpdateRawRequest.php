<?php

namespace App\Http\Requests\V4;

use Illuminate\Foundation\Http\FormRequest;
use App\UseCases\SampleUseCase;
use Illuminate\Validation\Rule;

/**
  * サンプルテーブルモデルのフォームからの直接更新時の値検証
  */
class SampleUpdateRawRequest extends FormRequest
{
    private SampleUseCase $sampleUseCase;

    function __construct()
    {
        $this->sampleUseCase = new SampleUseCase();
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $merge = [

        ];
        $this->merge($merge);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:32'],
            'price' => ['required', 'integer'],
            'memo' => ['nullable', 'string', 'max:4000'],
            'seq' => ['nullable', 'integer'],
            'created_at' => ['nullable', 'date'],
            'updated_at' => ['nullable', 'date']
        ];
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [
            'id' => 'ID',
            'name' => '名前',
            'price' => '値段',
            'memo' => 'メモ',
            'seq' => '順序',
            'created_at' => '登録日時',
            'updated_at' => '更新日時'
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        //
    }
}
