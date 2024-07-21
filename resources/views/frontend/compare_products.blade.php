@include('frontend.templates.header')
@include('frontend.templates.toastr-notifications')


<?php
use App\Models\CompareProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
$product_count = CompareProduct::where('user_id', Auth::id())->count();

?>

<style>
    .tp-compare-add-to-cart .tp-btn:hover {
        background-color: #006677;
        border-color: #006677;
        color: var(--tp-common-white);
    }

    .tp-compare-product-title a:hover {
        color: #006677;
    }
</style>

<main>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Compare</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span>Compare</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    @if (session('compare'))

        <section class="tp-compare-area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-compare-table table-responsive text-center">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <th>Product</th>
                                        @foreach (session('compare') as $id => $compare_items)
                                            <td data-id="{{ $id }}">
                                                <div class="tp-compare-desc">
                                                    <img src="{{ url('backend/images/product_images/' . $compare_items['image']) }}"
                                                        width="205px" height="176px" alt="">
                                                    <h4 class="tp-compare-product-title">
                                                        <a
                                                            href="{{ route('frontend.single_product', ['id' => $compare_items['id']]) }}">{{ Str::limit($compare_items['product_name'], 20) }}</a>
                                                    </h4>
                                                </div>
                                            </td>
                                        @endforeach

                                    </tr>
                                    <tr>
                                        <th>Description</th>

                                        @foreach (session('compare') as $id => $compare_items)
                                            <td data-id="{{ $id }}">
                                                <div class="tp-compare-desc">
                                                    <p style="white-space: pre-line">{{ $compare_items['features'] }}
                                                    </p>
                                                </div>
                                            </td>
                                        @endforeach


                                    </tr>
                                    <tr>
                                        <th>Price</th>

                                        @foreach (session('compare') as $id => $compare_items)
                                            <td data-id="{{ $id }}">
                                                <div class="tp-compare-price">
                                                    <span>₹{{ $compare_items['amount'] }}</span>
                                                    {{-- <span class="old-price">₹{{ $compare_items['amount'] }}</span> --}}
                                                </div>
                                            </td>
                                        @endforeach

                                    </tr>

                                    <tr>
                                        <th>Add to cart</th>
                                        @foreach (session('compare') as $id => $compare_items)
                                            @php
                                                $enquiry = App\Models\VariantOptions::where('id', $id)
                                                    ->pluck('enquiry')
                                                    ->first();
                                            @endphp

                                            @if ($enquiry == 0)
                                                <form action="{{ route('cart.store', ['id' => $id]) }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="product_id" id="product_id"
                                                        value="{{ $id }}">
                                                    <input type="hidden" name="product_qty" id="product_qty"
                                                        value="1">
                                                    <input type="hidden" name="compare_id" id="compare_id"
                                                        value="{{ $id }}">


                                                    <td data-id="{{ $id }}">
                                                        <div class="tp-compare-add-to-cart">
                                                            <button type="submit" class="tp-btn">Add to Cart</button>
                                                        </div>
                                                    </td>
                                                </form>
                                            @else
                                                <td>
                                                    <div class="tp-compare-add-to-cart">
                                                        <a
                                                            href="{{ route('frontend.single_product', ['id' => $id]) }}">
                                                            <button type="submit" class="tp-btn">Enquire Now</button>
                                                        </a>
                                                    </div>
                                                </td>
                                            @endif
                                        @endforeach

                                    </tr>

                                    <tr>
                                        <th>Remove</th>

                                        @foreach (session('compare') as $id => $compare_id)
                                            <td>
                                                <form action="{{ route('remove.from.compare') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="compare_id" id="compare_id"
                                                        value="{{ $id }}">

                                                    <button type="submit" class="tp-cart-action-btn">
                                                        <svg width="10" height="10" viewBox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                        <span>Remove</span>
                                                    </button>
                                                </form>
                                            </td>
                                        @endforeach

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($product_count != 0)
        @auth
            <section class="tp-compare-area pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tp-compare-table table-responsive text-center">
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <th>Product</th>
                                            @foreach ($compare as $compare_items)
                                                <td>
                                                    <div class="tp-compare-desc">
                                                        <img src="{{ url('backend/images/product_images/' . $compare_items['image']) }}"
                                                            width="205px" height="176px" alt="">
                                                        <h4 class="tp-compare-product-title">
                                                            <a
                                                                href="{{ route('frontend.single_product', ['id' => $compare_items['variant_option_id']]) }}">{{ Str::limit($compare_items->product_name, 20) }}</a>
                                                        </h4>
                                                    </div>
                                                </td>
                                            @endforeach

                                        </tr>
                                        <tr>
                                            <th>Description</th>

                                            @foreach ($compare as $compare_items)
                                                <td>
                                                    <div class="tp-compare-desc">
                                                        <p style="white-space: pre-line">{{ $compare_items['features'] }}
                                                        </p>
                                                    </div>
                                                </td>
                                            @endforeach


                                        </tr>
                                        <tr>
                                            <th>Price</th>

                                            @foreach ($compare as $compare_items)
                                                <td>
                                                    <div class="tp-compare-price">
                                                        <span>₹{{ $compare_items['amount'] }}</span>
                                                        {{-- <span class="old-price">₹{{ $compare_items['amount'] }}</span> --}}
                                                    </div>
                                                </td>
                                            @endforeach

                                        </tr>


                                        <tr>
                                            <th>Add to cart</th>
                                            @foreach ($compare as $compare_items)
                                                @php
                                                    $id = $compare_items->variant_option_id;
                                                    $enquiry = App\Models\VariantOptions::where('id', $id)
                                                        ->pluck('enquiry')
                                                        ->first();
                                                @endphp

                                                @if ($enquiry == 0)
                                                    <form
                                                        action="{{ route('compare.to.cart', ['id' => $compare_items->variant_option_id]) }}"
                                                        method="post">
                                                        @csrf

                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $compare_items->id }}">

                                                        <input type="hidden" name="product_id" id="product_id"
                                                            value="{{ $compare_items->variant_option_id }}">
                                                        <input type="hidden" name="product_qty" id="product_qty"
                                                            value="1">
                                                        <input type="hidden" name="compare_id" id="compare_id"
                                                            value="{{ $compare_items->id }}">

                                                        <td>
                                                            <div class="tp-compare-add-to-cart">
                                                                <button type="submit" class="tp-btn">Add to Cart</button>
                                                            </div>
                                                        </td>
                                                    </form>
                                                @else
                                                    <td>
                                                        <div class="tp-compare-add-to-cart">
                                                            <a
                                                                href="{{ route('frontend.single_product', ['id' => $compare_items['variant_option_id']]) }}">
                                                                <button type="submit" class="tp-btn">Enquire Now</button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endforeach

                                        </tr>



                                        <tr>
                                            <th>Remove</th>

                                            @foreach ($compare as $compare_items)
                                                <td>
                                                    <form action="{{ route('remove.from.compare') }}" method="post">
                                                        @csrf

                                                        <input type="hidden" name="id" id="id"
                                                            value="{{ $compare_items->id }}">
                                                        <input type="hidden" name="product_id" id="product_id"
                                                            value="{{ $compare_items->id }}">
                                                        <input type="hidden" name="product_qty" id="product_qty"
                                                            value="1">


                                                        <button type="submit" class="tp-cart-action-btn">
                                                            <svg width="10" height="10" viewBox="0 0 10 10"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                            <span>Remove</span>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endforeach

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endauth
    @else
        <div class="container" style="margin-top: 25px;width: 40%;">
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center>
                            <h4>Your compare products is empty </h4>
                            <a href="{{ route('frontend.shop') }}">back to the shop page</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>



    @endif



</main>


@include('frontend.templates.footer')
