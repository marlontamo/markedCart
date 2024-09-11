@extends('layout.app')
@section('content')
    <!-- cart + summary -->
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="card border shadow-0">
                        <div class="m-4">
                            <div class="mb-3">
                                <span class="card-title mb-4 h4">Your shopping cart</span>
                                <a href="{{ route('clear') }}" class="float-end">Clear
                                    All</a>:
                            </div>
                            <hr />
                            @foreach ($items as $item)
                            <div class="row gy-3 mb-4">
                                <div class="col-lg-5">
                                    <div class="me-lg-5">
                                        <div class="d-flex">
                                            <img src="{{ $item->attributes->image }}"
                                                class="border rounded me-3" style="width: 96px; height: 96px" />
                                            <div class="">
                                                <a href="#" class="nav-link">{{ $item->name }}</a>
                                                <p class="text-muted">{{ $item->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                    <td>
                                        <div class="input-group bootstrap-touchspin">
                                            <span class="input-group-btn"><a
                                                    href="{{ route('decrease.quantity',$item->id) }}"
                                                    class="btn btn-default bootstrap-touchspin-down"
                                                    type="button">-</a></span><span
                                                class="input-group-addon bootstrap-touchspin-prefix"
                                                style="display: none"></span>
                                            <input type="text" name="" value="{{ $item->quantity }}"
                                                class="form-control mx-1 px-3" />
                                            <span class="input-group-addon bootstrap-touchspin-postfix"
                                                style="display: none"></span><span class="input-group-btn">
                                                <a href="{{ route('add.quantity',$item->id) }}"
                                                    class="btn btn-default bootstrap-touchspin-up"
                                                    type="button">+</a></span>
                                        </div>
                                    </td>
                                    <div class="">
                                        <p class="h6">
                                            {{ $item->quantity * $item->price }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                    <div class="float-md-end">
                                        <a href="{{ route('remove.item',$item->id) }}"
                                            class="btn btn-light border text-danger icon-hover-danger">
                                            Remove</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p>
                                <i class="fas fa-truck text-muted fa-lg"></i> Free Delivery
                                within 1-2 weeks
                            </p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <!-- <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name=""
                                            placeholder="Coupon code" />
                                        <button class="btn btn-light border">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>

                    <div class="card shadow-0 border">
                        <div class="card-body">






                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold">{{ $total }}</p>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-success w-100 shadow-0 mb-2">
                                Checkout
                                </a>
                                <a href="{{ route('shop')}}" class="btn btn-light w-100 border mt-2">
                                    Back to shop
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- summary -->
            </div>
        </div>
    @stop
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


</body>

</html>
