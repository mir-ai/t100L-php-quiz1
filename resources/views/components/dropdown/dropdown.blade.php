@props([''])

@auth
  <x-dropdown.dropdown-link href="/" label="ゲスト用トップ" />

  @if (Auth::user())

    
  @endif
@endauth

<div class="dropdown-divider"></div>

