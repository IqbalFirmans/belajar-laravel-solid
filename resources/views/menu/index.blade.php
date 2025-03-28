<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Menu</title>
</head>

<body>

    <br>
    <div style="display: flex; justify-content: space-between">
        <button>
            <a href="/menu/create" style="text-decoration: none; color: black;">Create Menu</a>
        </button>

        @if ($message = Session::get('success'))
            <p style="margin: 0px 30px; color: green;">{{ $message }}</p>
        @endif
    </div>


    <br>
    <br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        @foreach ($data as $menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menu->name }}</td>
                <td>
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="100">
                </td>
                <td>
                    <button>
                        <a href="{{ route('menu.edit', $menu->id) }}"
                            style="text-decoration: none; color: black;">Edit</a>
                    </button>

                    <button type="submit" form="delete">Delete</button>

                    <form action="{{ route('menu.destroy', $menu->id) }}" method="post" id="delete"
                        style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
