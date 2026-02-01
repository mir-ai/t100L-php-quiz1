{{-- SampleV4Controller.php --}}

{{-- サンプルテーブル １件詳細表示フォーム --}}

        <div class="card mb-4">
          <div class="card-body">
            <div class="fs-5 mb-3 fw-bold">詳細情報</div>
        {{-- ID  --}}
        <x-show.open class="ms-5" label="ID" />
        <x-show.show :value="$sample->id" /> 
        <x-show.close  />

        {{-- 名前  --}}
        <x-show.open class="ms-5" label="名前" />
        <x-show.show :value="$sample->name" /> 
        <x-show.close  />

        {{-- 値段  --}}
        <x-show.open class="ms-5" label="値段" />
        <x-show.show :value="$sample->price" /> 
        <x-show.close  />

        {{-- メモ  --}}
        <x-show.open class="ms-5" label="メモ" />
        <x-show.show :value="$sample->memo" /> 
        <x-show.close  />

        {{-- 順序  --}}
        <x-show.open class="ms-5" label="順序" />
        <x-show.show :value="$sample->seq" /> 
        <x-show.close  />

        {{-- 登録日時  --}}
        <x-show.open class="ms-5" label="登録日時" />
        <x-show.show :value="MirUtil::hilightDt($sample->created_at)" /> 
        <x-show.close  />

        {{-- 更新日時  --}}
        <x-show.open class="ms-5" label="更新日時" />
        <x-show.show :value="MirUtil::hilightDt($sample->updated_at)" /> 
        <x-show.close  />

          </div>
        </div>

