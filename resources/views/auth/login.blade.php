<form action="{{LaravelLocalization::localizeUrl('auth/attempt')}}" method='post'>
	@csrf
    <div>
        <input type='text' name='email' value='aloy@gmail.com'>
    </div>
    <div>
        <input type='text' name='password' value='password'>
    </div>
    <div>
        <input type='submit'>
    </div>
</form>
