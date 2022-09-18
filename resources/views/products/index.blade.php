@extends('categories.layout')

@section('content')
    <a class="btn btn-success mb-4" href="{{ route('products.create') }}" role="button">Add Product</a>

    <table id="myTable" class="display">
        <thead>
            <tr>
                <td scope="col">Id</td>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        {{ $product->category->name }}
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger product_destroy">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

    <script>
        $('.product_destroy').click(function(event) {
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
