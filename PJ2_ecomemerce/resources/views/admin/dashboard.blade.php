<x-app-layout>
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            <h4 class="pt-3 pb-3">Dash Broad</h4>
            <div class="card">

                <div class="card-header d-flex justify-content-between">

                    <h5 class="m-1">All Product</h5>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Create new</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">QTY</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $product->id }}</th>
                                    <td><img src="{{ asset($product->image)}}" alt="" style="width:100px !important;"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-primary mx-1">Edit</a>

                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
