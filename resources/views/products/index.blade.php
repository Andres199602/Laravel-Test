@extends('categories.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Test Laravel 6</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="#"> Create New Product</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                {{-- <th>Id</th> --}}
                <th scope="col">Name</th>
                <th scope="col">Categories_id</th>
                {{-- <th width="100px">Action</th> --}}
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    @push('scrips')
        <script>
            $(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "{{ route('products.index') }}",
                        type: GET
                    },
                    columns: [
                        // { data: 'id', name: 'id' },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'categories_id',
                            name: 'categories_id'
                        },
                    ]
                });
            });
        </script>
    @endpush
@endsection
