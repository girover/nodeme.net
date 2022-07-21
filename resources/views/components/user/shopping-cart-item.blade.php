@props(['cart_item'])

<div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
    {{-- <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center"> --}}
    <img src="{{asset('images/logo_blue.svg')}}" alt="Number" class="h-full w-full object-center">
</div>

<div class="ml-4 flex flex-1 flex-col">
    <div>
    <div class="flex justify-between text-base font-medium text-gray-900">
        <h3 class="text-xl font-extrabold">
        <a href="#"> {{$cart_item->number}} </a>
        </h3>
        <p class="ml-4">${{$cart_item->price}}</p>
    </div>
    <p class="mt-1 text-sm text-gray-500">mhf</p>
    </div>
    <div class="flex flex-1 items-end justify-between text-sm">
    <p class="text-gray-500">Qty 1</p>

    <div class="flex">
        <form action="{{route('cart.remove_item')}}" method="post">
            @csrf
            <input type="hidden" name="number" value="{{$cart_item->number}}">
            <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
        </form>
    </div>
    </div>
</div>