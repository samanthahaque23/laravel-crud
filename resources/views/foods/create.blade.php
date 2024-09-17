<!DOCTYPE html>
<html>
<head>
    <title>Create Food Item</title>
</head>
<body>
    <h1>Create New Food</h1>
    <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <label for="allergen">Allergens:</label>
        <input type="text" name="allergen" id="allergen">
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
