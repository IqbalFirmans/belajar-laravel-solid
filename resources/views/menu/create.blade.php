<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Menu</title>
</head>

<body>

    <h1>Create Menu</h1>

    <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name Menu">
        <br>
        <br>
        <input type="file" name="image" placeholder="Upload Image">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
