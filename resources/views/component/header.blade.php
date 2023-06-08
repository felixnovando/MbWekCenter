<style>
    #dropdown-trigger:hover>#dropdown {
        display: block
    }
</style>

<div id="header"
    class="sticky top-0 left-0 z-50 flex items-center w-full p-3 font-semibold text-white bg-gray-500 justify-evenly">
    <div class="text-2xl">
        MbWekCenter
    </div>
    <div id="nav" class="flex items-center justify-between w-1/2 text-lg">
        <a class="hover:text-black" href="/">Home</a>
        <a class="hover:text-black" href="/search">Search Product</a>

        @if (!\Illuminate\Support\Facades\Auth::check())
            <a class="hover:text-black"href="/login">Login</a>
            <a class="hover:text-black"href="/register">Register</a>
        @else
            <div id="dropdown-trigger" class="relative cursor-pointer">
                <p class="m-1">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                <ul id="dropdown" class="absolute hidden w-40 bg-gray-500">
                    @if (\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                        <li class="px-2 py-1 hover:text-black"><a href="/insertProduct">Insert Product</a></li>
                        <li class="px-2 py-1 hover:text-black"><a href="/manageUser">Manage User</a></li>
                    @else
                        <li class="px-2 py-1 hover:text-black"><a href="/updateProfile">Update profile</a></li>
                        <li class="px-2 py-1 hover:text-black"><a href="/transaction">Transaction</a></li>
                        <li class="px-2 py-1 hover:text-black"> <a href="/cart">Cart</a></li>
                    @endif
                    <li class="px-2 py-1 hover:text-black"><a href="/logout">Log Out</a></li>
                </ul>
            </div>
        @endif

    </div>
</div>
