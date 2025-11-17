<form {{ $attributes->merge(['method' => 'POST']) }}>
    @csrf
    @method('POST')
    {{ $slot }}
</form>
