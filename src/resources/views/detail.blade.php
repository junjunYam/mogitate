@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('main')
<main>
    <form action="/products/{product_id}/update" class="update-form" method="post" enctype=”multipart/form-data”>
        @csrf
        <div class="update-form__upper-items">
            <div class="update-form__upper-left-items">
                @isset($product->image)
                    <img src="{{ asset('storage/fruits-img/' . $product->image) }}" alt="">
                @endisset
                <input type="file" name="image" value="{{ $product->image }}" placeholder="ファイルを選択">
            </div>
            <div class="update-form__upper-right-items">
                <div class="update-form__input-item">
                    <p>商品名</p>
                    <input type="text" name="name" value="{{ $product->name }}" placeholder="商品名を入力">
                </div>
                <div class="update-form__input-item">
                    <p>値段</p>
                    <input type="text" name="price" value="{{ $product->price }}" placeholder="値段を入力">
                </div>
                <div class="update-form__input-item">
                    <p>季節</p>
                    <div class="update-form__checkbox">
                        @foreach ($seasons as $season)
                            <input class="update-form__input-season" type="checkbox" name="seasons[]" id="{{ 'checkbox' . $season->id }}" value="{{ $season->id }}" {{ $product->seasons->contains($season->id) ? 'checked' : '' }}><label for="{{ 'checkbox' . $season->id }}" class="label-check">{{ $season->name }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="update-form__middle-items">
            <p>商品説明</p>
            <textarea name="description" placeholder="商品の説明を入力">{{ $product->description }}</textarea>
        </div>
        <div class="update-form__lower-items">
            <div class="back-btn">
                <a href="/products">戻る</a>
            </div>
            <div class="update-form__btn">
                <button class="update-form__btn-submit" type="submit">変更を保存</button>
            </div>
        </div>
    </form>
    <form action="" class="delete-form">
        <div class="delete-form__btn">
            <button class="delete-form__btn-submit" type="submit"><a href=""></a></button>
        </div>
    </form>
</main>
@endsection
