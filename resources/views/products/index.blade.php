@extends("layouts.app")

@section("content")
	<div class="card mt-5">
		<div class="card-header"><h4>Product List</h4></div>
		<div class="card-body">

            @session("success")
            <div class="alert alert-success">{{ $value }}</div>
            @endsession

            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mb-3"> <i class="fa fa-plus"></i> Create Product</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">ID</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
@endsection
