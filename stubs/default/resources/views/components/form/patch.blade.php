<form {{ $attributes->merge(['method' => 'POST']) }}>
    @csrf
    @method('PATCH')
    {{ $slot }}
</form>
