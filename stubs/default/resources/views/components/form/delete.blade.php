<form {{ $attributes->merge(['method' => 'POST']) }}>
    @csrf
    @method('DELETE')
    {{ $slot }}
</form>
