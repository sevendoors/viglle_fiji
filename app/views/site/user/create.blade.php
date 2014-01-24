
        {{ Basset::show('public.css') }}
{{-- Web site Title --}}
{{{ Lang::get('user/user.register') }}} ::

{{-- Content --}}
<div class="page-header">
	<h1>注册YO斐济账号登录</h1>
</div>
{{ Confide::makeSignupForm()->render() }}
