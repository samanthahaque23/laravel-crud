<!DOCTYPE html>
<html>
<head>
    <title>Food Menu</title>
</head>
<body>
    <h1>Food Menu</h1>
    <a href="{{ route('foods.create') }}">Create New Food</a>
    <ul>
        @foreach ($foods as $food)
            <li>
                <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" width="100">
                <strong>{{ $food->name }}</strong> - ${{ $food->price }}
                <p>{{ $food->description }}</p>
                <small>Allergens: {{ $food->allergen }}</small>
                <br>
                <a href="{{ route('foods.edit', $food->id) }}">Edit</a>
                <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
