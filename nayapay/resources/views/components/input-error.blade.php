@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-md  text-center text-white space-y-1 bg-red-500 p-4 rounded-xl']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
