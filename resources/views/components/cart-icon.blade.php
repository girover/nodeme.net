@props(['quantity'])

@php
    $qty = isset($quantity) ? $quantity : 0 ;
@endphp

<a href="{{route('cart')}}" class="ml-6 mr-6">
    <div class="relative inline-block">
        <img class="w-6" src="{{asset('images/cart.svg')}}" alt="" srcset="">
        <div class="absolute top-[-6px] right-[-6px] bg-orange-600 text-white font-bold w-8/12 h-8/12 text-xs rounded-full text-center">{{$quantity}}</div>
    </div>
</a>
