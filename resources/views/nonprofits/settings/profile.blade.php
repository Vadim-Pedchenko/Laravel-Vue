@extends('nonprofits.layout')

@section('page_id', 'settings')

@section('content')
	<div class="two-columns">
		@include('nonprofits.settings._sidebar')
		<div class="single-column single-column--box">
			{{ Form::open([
				'route' => ['nonprofits.settings.profile', $authNonprofit->id], 'method' => 'put', 'files' => true,
				'autocomplete' => 'off', 'novalidate', 'class' => 'form--list js-form'
			]) }}
				@include('app.components.form-field', [
					'field' => 'name', 'label' => 'Name',
					'input' => Form::text('name', old('name') ?: $authNonprofit->name, ['class' => 'form__field'])
				])
				@include('app.components.form-field', [
					'field' => 'mission', 'label' => 'Mission',
					'input' => Form::text('mission', old('mission') ?: $authNonprofit->mission, ['class' => 'form__field'])
				])
				@include('app.components.form-field', [
					'field' => 'description', 'label' => 'Description',
					'input' => Form::textarea('description', old('description') ?: $authNonprofit->description, ['class' => 'form__field', 'rows' => 3])
				])
				@include('app.components.form-field', [
					'field' => 'website_url', 'label' => 'Website',
					'input' => Form::text('website_url', old('website_url') ?: $authNonprofit->website_url, ['class' => 'form__field'])
				])
				<div class="form-field {{ form_error('photo') }}">
					<label class="form__label">Logo</label>
					<div class="field-wrapper">
						<span class="btn btn--default btn--small file-upload js-file-uploader" data-name="photo">Upload Logo</span>
						<span class="file-selected">No file selected</span>
						<span class="error-block">
							{{ $errors->first('photo') ?: '' }}
						</span>
					</div>
				</div>
				<div class="form__footer">
					<button type="submit" class="btn btn--primary btn--large btn--block">
						<i class="fa fa-spinner btn__loader" aria-hidden="true"></i>
						Save Settings
					</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop
