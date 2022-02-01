

<h1>{{ config('app.name') }}</h1>
<p>@lang('content.Welcome') {{ $user->first_name }} {{ $user->last_name }}, qeydiyyatınız uğurla başa çatıb</p>
<h3>Saytımıza giriş məlumatlarınız</h3>
<p>Email: {{ $user->email }}</p>
<p>Şifrə: {{ $user->password }}</p>