@extends('layout.app')
@section('content')

    <section class="py-5">
        <div class="container py-5">
            <div class="row g-4">
               @foreach ($products as $product)
               <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p>${{ $product->price }}.00</p>

                        <a href="{{ route('add.cart',$product->id) }}" class="btn btn-primary">Add cart</a>
                    </div>
                </div>
            </div>
               @endforeach

            </div>
        </div>
    </section>
    @stop
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
