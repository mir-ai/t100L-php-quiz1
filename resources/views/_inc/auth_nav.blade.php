@auth
  @if (Auth::user()->IsAdmin)
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        管理者向けメニュー
      </a>
      <ul class="dropdown-menu">
        <x-dropdown.dropdown-link :href="route('r4.posts.index')" label="記事" />
        <x-dropdown.dropdown-link :href="route('r4.inquiries.index')" label="お問い合わせ" />
        <x-dropdown.dropdown-link :href="route('r4.tags.index')" label="タグ" />
        <x-dropdown.dropdown-link :href="route('r4.users.index')" label="アカウント" />
        <x-dropdown.dropdown-link :href="route('r4.mir_laravel_logs.index')" label="Laravelログ" />
        <x-dropdown.dropdown-link :href="route('r4.mir_audit_logs.index')" label="ユーザーアクセスログ" />
        <x-dropdown.dropdown-link :href="route('r4.change_logs.index')" label="変更記録" />
      </ul>
    </li>
  @endif
@endauth
