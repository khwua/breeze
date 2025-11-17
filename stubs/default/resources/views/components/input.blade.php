@props(['label' => null, 'errorValidate' => false])

@if($label)
    <label for="{{ $attributes->get('name') }}" class="form-label">
        {{ __($label) }}
    </label>
@endif

<input {{ $attributes->merge([
    'type' => 'text',
    'id' => $attributes->get('name'),
    'class' => ($errors->has($attributes->get('name'))) ? 'form-control is-invalid': 'form-control'
]) }}>

@if($errorValidate)
    <x-input-error :messages="$errors->get($attributes->get('name'))" class="mt-2" />
@endif
