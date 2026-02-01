{{-- SampleV4Controller.php --}}

{{-- サンプルテーブル 一覧表示用テーブル --}}

@php
    $route = 'r4.samples.index';
    if (isset($is_livewire)) {
        $route = 'r4.samples.index_live';
    }
@endphp

{{-- インデックス上部のタブ --}}
@relativeInclude('_index_tab')

@forelse ($samples as $sample)
  @if ($loop->first)
    {{-- テーブル開く --}}
    <div class="table-responsive">
      <table class="table table-responsive table-bordered">
        <thead>
          <tr class="table-success">
            <th nowrap>ID <x-ui.sort-arrow column="id" :conds="$conds" :route="$route" /></th>
            <th nowrap>名前 <x-ui.sort-arrow column="nm" :conds="$conds" :route="$route" /></th>
            <th nowrap>値段 <x-ui.sort-arrow column="pr" :conds="$conds" :route="$route" /></th>
            <th nowrap>メモ <x-ui.sort-arrow column="mm" :conds="$conds" :route="$route" /></th>
            <th nowrap>更新日時 <x-ui.sort-arrow column="uat" :conds="$conds" :route="$route" /></th>
        </thead>
        <tbody>
  @endif

  {{-- 情報を１件表示 --}}
  @php
    // TODO: show を実装しない場合は除去する
    $href = route('r4.samples.edit', array_merge($conds, ['sample' => $sample]));
  @endphp
  <tr>
    <td nowrap><a href="{{ $href }}">{{ $sample->id }}</a></td>
    <td>{{ $sample->name }}</td>
    <td nowrap>{{ $sample->price }}</td>
    <td>{{ $sample->memo }}</td>
    <td nowrap>{!! MirUtil::hilightDt($sample->updated_at) !!}</td>

  </tr>

  {{-- テーブル閉じる --}}
  @if ($loop->last)
    </tbody>
    </table>
    </div>
  @endif

@empty

  {{-- 見つからなかった --}}
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">条件に合うサンプルテーブルは見つかりません。</h4>
    </div>
  </div>
@endforelse
