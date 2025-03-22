<style>
    .input-group {
        display: flex;
        align-items: center;
    }
    .input-group .form-control {
        margin: 0 5px;
    }
    .input-group .btn {
        padding: 0.25rem 0.5rem;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Корзина</h1>

    @if ($cartItems->isEmpty())
        <div class="alert alert-info">
            Ваша корзина пуста.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Курс</th>
                        <th>Количество</th>
                        <th>Цена за единицу</th>
                        <th>Скидка</th>
                        <th>Цена со скидкой</th>
                        <th>Общая стоимость</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        @php
                            $price = $item->course->price;
                            $discount = $item->course->discount;
                            $discountedPrice = $price * (1 - $discount / 100);
                            $totalItemPrice = $discountedPrice * $item->quantity;
                        @endphp
                        <tr>
                            <td>{{ $item->course->name ?? 'Курс удален' }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group" style="width: 130px;">
                                        <button type="button" class="btn btn-outline-secondary btn-sm minus-btn">-</button>
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm text-center" style="width: 50px;">
                                        <button type="button" class="btn btn-outline-secondary btn-sm plus-btn">+</button>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-outline-secondary mt-1">Обновить</button>
                                </form>
                            </td>
                            <td>{{ number_format($price, 2) }} ₽</td>
                            <td>{{ $discount }}%</td>
                            <td>{{ number_format($discountedPrice, 2) }} ₽</td>
                            <td>{{ number_format($totalItemPrice, 2) }} ₽</td>
                            <td>
                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-right mt-4">
            <h4>Итоговая сумма: {{ number_format($totalPrice, 2) }} ₽</h4>
        </div>

        <div class="text-right mt-4">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">Оформить заказ</button>
            </form>
        </div>
    @endif
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Обработка кнопки "плюс"
        document.querySelectorAll('.plus-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('input[name="quantity"]');
                input.value = parseInt(input.value) + 1;
            });
        });

        // Обработка кнопки "минус"
        document.querySelectorAll('.minus-btn').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('input[name="quantity"]');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });
    });
</script>
