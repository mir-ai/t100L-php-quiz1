{{-- SampleV4Controller.php --}}

{{-- 一覧表示上のタブ --}}
{{-- １件毎、日別、月別、放送毎 --}}
{{--
<ul class="nav nav-tabs">
  <x-hnav.link label="1件毎" :active="$conds['v'] == ''" :href="route('r4.samples.index', array_merge($conds, ['v' => '']))" />
  <x-hnav.link label="時間別" :active="$conds['v'] == 'hourly'" :href="route('r4.samples.report', array_merge($conds, ['v' => 'hourly']))" />
  <x-hnav.link label="日別" :active="$conds['v'] == 'daily'" :href="route('r4.samples.report', array_merge($conds, ['v' => 'daily']))" />
  <x-hnav.link label="月別" :active="$conds['v'] == 'monthly'" :href="route('r4.samples.report', array_merge($conds, ['v' => 'monthly']))" />
</ul>
--}}
