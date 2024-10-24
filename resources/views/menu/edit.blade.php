<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Menu</title>
</head>
<body>

    <h1>Edit Menu</h1>

    <form action="{{ route('menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" placeholder="Name Menu" value="{{ $menu->name }}">
        <br>
        <input type="file" name="image" placeholder="Upload Image">
        <br>
        <img src="{{ asset('storage/'. $menu->image) }}" alt="Menu Image" width="100" height="100">
        <br>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

