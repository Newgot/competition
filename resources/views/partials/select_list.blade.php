<select name="{{ $name }}">
    {{ $value = isset($value) ? $value : 'id' }}
    {{ $text = isset($text) ? $text : 'name' }}
    @if (!isset($current)):
    <option>Выберите...</option>
    @endif
    @foreach($items as $item)
            <option
                {{ isset($current) && $current === $item->$value ? 'selected' : '' }}
                value="{{ $item->$value }}"
            >
                {{ $item->$text }}
            </option>
    @endforeach
</select>

