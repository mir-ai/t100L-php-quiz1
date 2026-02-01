{{-- SampleV4Controller.php --}}

{{-- サンプルテーブル 編集フォーム(直接編集) --}}

<div class="mt-4">

  {{-- 検索条件を次に引き継ぐhiddenタグ --}}
  <x-form.conds-to-hidden :conds="$conds" />

  @php
    // 直接編集編集項目
    $column_kvs = [
        'id' => 'ID',
        'name' => '名前',
        'price' => '値段',
        'memo' => 'メモ',
        'seq' => '順序',
        'created_at' => '登録日時',
        'updated_at' => '更新日時'
    ];
  @endphp

  {{-- 直接編集フォーム --}}
  @foreach ($column_kvs as $key => $label) 
    <x-input.open :key="$key" :label="$label" class="lg-1" />
    @php
      $v = $announcement[$key] ?? '';
      if (is_array($v)) {
        $v = json_encode($v);
      }
    @endphp
    <x-input.text :key="$key" :default="old($key, $v)" class="form-control-lg" />
    <x-input.close :key="$key" :desc="$key" />
  @endforeach

  <div class="mt-4 mb-2">
    <x-input.submit-back :label="$submitButton" :backUrl="$back_url ?? ''" class="btn-lg" />
  </div>

</div>
