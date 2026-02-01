{{-- SampleV4Controller.php --}}

{{-- サンプルテーブル 登録・編集フォーム --}}

{{-- 検索条件を次に引き継ぐhiddenタグ --}}
<x-form.conds-to-hidden :conds="$conds" />

<div class="mt-4 lg-1">
  {{-- 名前 --}}
  <x-input.open key="name" label="名前" required="Y" />
  <x-input.text key="name" :default="old('name', $sample->name ?? '')" maxlen="32" class="form-control-lg" />
  <x-input.close key="name" desc="名前を入力します。" maxlen="32" />

  {{-- 値段 --}}
  <x-input.open key="price" label="値段" required="N" />
  <x-input.text key="price" :default="old('price', $sample->price ?? '')" maxlen="" class="form-control-lg" />
  <x-input.close key="price" desc="値段を入力します。" maxlen="" />

  {{-- メモ --}}
  <x-input.open key="memo" label="メモ" required="N" />
  <x-input.text key="memo" :default="old('memo', $sample->memo ?? '')" maxlen="" class="form-control-lg" />
  <x-input.close key="memo" desc="メモを入力します。" maxlen="" />

  <div class="mt-4 mb-2">
    <x-input.submit-back :label="$submitButton" :backUrl="$back_url ?? ''" class="btn-lg" />
  </div>

</div>
