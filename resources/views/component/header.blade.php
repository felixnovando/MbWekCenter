<style>
    #header{
        width: 100%;
        display: flex;
        justify-content: space-evenly;
    }
    #nav{
        width: 50%;
        display: flex;
        justify-content: space-between;
    }
</style>

<div id="header">
    <div>
        MbWekCenter
    </div>
    <div id="nav">
        <a href="/">Home</a>
        <a href="/search">Search Product</a>

        @if(!\Illuminate\Support\Facades\Auth::check())
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @else
            <div>
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <ul>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == "Admin")
                        <li><a href="/insertProduct">Insert Product</a></li>
                        <li><a href="/manageUser">Manage User</a></li>
                    @else
                        <li><a href="/updateProfile">Update profile</a></li>
                        <li><a href="/transaction">Transaction</a></li>
                        <li> <a href="/cart">Cart</a></li>
                    @endif
                    <li><a href="/logout">Log Out</a></li>
                </ul>
            </div>
        @endif

    </div>
</div>
