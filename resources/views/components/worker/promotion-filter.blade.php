
@props(['promotion', 'promotionFilter'])

<option value="{{ $promotion->id }}" {{ $promotionFilter == $promotion->id ? 'selected' : '' }}>
    {{ $promotion->name }}
</option>
