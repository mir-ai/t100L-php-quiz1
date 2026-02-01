{{-- SampleV4Controller.php --}}

@extends('layouts.app')

@section('rightnav')
@endsection

@section('js')
  <script src="https://code.jquery.com/ui/1.14.2/jquery-ui.min.js" defer crossorigin="anonymous">
  </script>
  <script type="module">
    $(function() {
      $('#sort').sortable();

      $('#post_button').click(function() {
        var items = $("#sort").sortable("toArray");

        $('#item_ids').val(items);
        return true;
      });
    });
  </script>
@endsection

{{-- サンプルテーブル情報一覧表示画面 --}}
@section('content')

  {{-- 水平ナビ --}}
  @include('_inc.hnav')
  {{-- SUB_NAVI --}}

  {{-- 件名 --}}
  <h2 class="miraie5">サンプルテーブルの順序</h2>
  <p class="text-secondary">各サンプルテーブルをドラッグすることで、並び順を変更できます。</p>

  @forelse ($samples as $sample)
    @if ($loop->first)
      <ul id="sort" class="list-group">
    @endif

    <li id="{{ $sample->id }}" class="list-group-item lg-1">
      {{ $sample->ItemTitle }}
    </li>

    @if ($loop->last)
      </ul>

      <x-form.open id="form_seq_sample"  method="POST" :action="route('r4.samples.seq_save')" class="" />

      <x-input.submit label="保存" key="post_button" class="btn btn-success form-control btn-lg my-4" />
        <input type="hidden" name="item_ids" value="" id="item_ids">
      <x-form.close />
    
    @endif

  @empty

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">サンプルテーブルはありません</h4>
      </div>
    </div>
  @endforelse

@endsection
