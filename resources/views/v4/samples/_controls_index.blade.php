{{-- SampleV4Controller.php --}}

@php
  $next_route = isset($is_livewire) ? 'r4.samples.index_live' : 'r4.samples.index';
@endphp

<div class="d-flex flex-wrap">
  <div class="me-auto">
    @if (Route::has('r4.samples.create'))
      <a href="{{ route('r4.samples.create', $conds) }}" class="btn btn-success mb-2">新規登録</a>
    @endif

    @if (Route::has('r4.samples.seq'))
      <a href="{{ route('r4.samples.seq', $conds) }}" class="btn btn-outline-success ms-2 mb-2">並び順変更</a>
    @endif  
  </div>

  <form method="get" action="{{ route($next_route) }}">
    <x-form.conds-to-hidden :conds="$conds" />
    <div class="">
      <div class="input-group mb-3">
        <input type="search" id="s" name="s" class="form-control" placeholder="キーワード" aria-label="検索" aria-describedby="button-addon2" value="{{ $conds['s'] ?? '' }}">
        <button type="submit" name="search" class="btn btn-primary">絞り込み</button>
      </div>
    </div>
  </form>
  <div class="">
    {{-- TODO: add query variable to clear condictions--}}
    <a href="{{ route($next_route, array_merge($conds, ['s' => '', 'catf' => '', 'catt' => '', 'cid' => '', 'lid' => ''])) }}" class="btn btn-link mb-2">クリア</a>
  </div>
  <div class="ms-auto">

    @if (Route::has('r4.samples.report'))
      <a href="{{ route('r4.samples.report', $conds) }}" class="btn btn-outline-primary ms-2 mb-2"><i class="bi bi-download"></i> レポート</a>
    @endif

    @if (Route::has('r4.samples.download'))
      {{-- TODO: remove $conds if download all data. --}}
      <a href="{{ route('r4.samples.download', $conds) }}" class="btn btn-outline-primary ms-2 mb-2"><i class="bi bi-download"></i> ダウンロード</a>
    @endif


    @if (Route::has('r4.samples.uploader'))
      <a href="{{ route('r4.samples.uploader') }}" class="btn btn-outline-primary ms-2 mb-2" dusk="upload-button"><i
          class="bi bi-upload"></i> アップロード</a>
    @endif

  </div>
</div>

@if ($search_description ?? '')
  <p class="text-primary">検索条件：{{ $search_description }}</p>
@endif
