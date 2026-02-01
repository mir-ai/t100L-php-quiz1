{{-- SampleV4Controller.php --}}

@extends('layouts.app')

@section('js')
  @relativeInclude('_javascripts')
@endsection

{{-- サンプルテーブル１件表示画面 --}}
@section('content')

  {{-- 水平ナビ --}}
  @include('_inc.hnav')
  {{-- SUB_NAVI --}}

  {{-- 検索ボックス、登録・ダウンロード・アップロードボタン --}}
  {{-- @relativeInclude('_controls_index') --}}

  {{-- 件名 --}}
  <h2 class="miraie5">
    <x-headline.back :href="route('r4.samples.last_conds')" />
    {{ $sample->ItemTitle }}の詳細
  </h2>

  {{-- 登録・編集・削除ボタン等 --}}
  @relativeInclude('_controls_detail', [
      'show_edit_button' => true,
  ])

  {{-- 詳細データ表示 --}}
  @relativeInclude('_show')

  {{-- 登録・編集・削除ボタン等 --}}
  @relativeInclude('_controls_detail', [
      'show_delete_button' => true,
  ])
@endsection
