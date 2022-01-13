<option value="">{{ trans('site.select') }}</option>
@if(Auth::check())
	@foreach (\App\Models\Country::get() as $data)
	<option value="{{ $data->country_name }}" {{ Auth::user()->country == $data->country_name ? 'selected' : '' }}>{{ $data->country_name }}</option>
	@endforeach
@else
	@foreach (\App\Models\Country::get() as $data)
	<option value="{{ $data->country_name }}">{{ $data->country_name }}</option>
	@endforeach
@endif
