@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('main')
<main>
    <div class="product-list__ttl-btn">
        <h2>
            商品一覧
        </h2>
        <div class="product-add__btn">
            <a href="/products/register">+商品を追加</a>
        </div>
    </div>
    <div class="container">
        <form action="/products/search" class="search-form" method="get">
            @csrf
            <input type="text" class="search-form__input" name="keyword" placeholder="商品名で検索">
            <button class="search-form__btn" type="submit">検索</button>
        </form>
        <div class="container-cards">
            @foreach ($products as $product)
                <a class="container-card" href="{{ route('product.detail', ['product_id' => $product->id]) }}">
                    <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="" class="container-card__img">
                    <div class="container-card__txt">
                        <p>{{ $product->name }}</p>
                        <p>{{ "¥" . $product->price }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    {{ $products->links() }}
</main>
@endsection

</html>