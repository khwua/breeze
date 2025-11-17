<form {{ $attributes->merge(['method' => 'POST']) }}>
    @csrf
    @method('PUT')
    {{ $slot }}
</form>
