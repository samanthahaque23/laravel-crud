<!DOCTYPE html>
<html>
<head>
    <title>Edit Food Item</title>
</head>
<body>
    <h1>Edit Food: {{ $food->name }}</h1>
    <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $food->name }}" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="{{ $food->price }}" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $food->description }}</textarea>
        <br>
        <label for="allergen">Allergens:</label>
        <input type="text" name="allergen" id="allergen" value="{{ $food->allergen }}">
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
