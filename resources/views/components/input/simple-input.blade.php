@if (!is_null($label))
    <label class="text-base block mb-2">
        {{ $label }}
    </label>
@endif
<input
    class="rounded-2xl bg-form-bg py-[13px] px-7 w-full focus:outline-alerange focus:outline-none border border-gray-200"
    type="{{ $type }}" {{ $attributes }} />

@if (!is_null($error))
    @error($error)
        <span class="error text-red-500">{{ $message }}</span>
    @enderror
@endif
