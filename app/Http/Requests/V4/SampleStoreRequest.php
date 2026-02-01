<?php

namespace App\Http\Requests\V4;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\UseCases\SampleUseCase;
use Illuminate\Validation\Rule;

/**
  * サンプルテーブルモデルのフォームからの登録時の値検証
  */
class SampleStoreRequest extends FormRequest
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
            'seq' => time(),

        ];
        $this->merge($merge);
    }

    public function rules()
    {
        return [
            'id' => ['nullable', 'integer'],
            'name' => ['required', 'string', 'max:32'],
            'price' => ['nullable', 'integer'],
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
