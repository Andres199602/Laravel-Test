@extends('categories.layout')
@include('sweetalert::alert')

@section('content')
    <a class="btn btn-success mb-4" href="{{ route('categories.create') }}" role="button">Add Category</a>

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger category_destroy">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}

    <script>
        $('.category_destroy').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
