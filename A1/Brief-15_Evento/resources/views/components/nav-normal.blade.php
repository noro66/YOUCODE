<nav class="p-6 bg-white flex items-center justify-between mb-4">
    <ul class="flex justify-between gap-6">
        <li>
            <a href="/" >Home</a>
        </li>
        <li>
            <a href="" >Dashboard</a>
        </li>
        <li>
            <a href="{{route('events.index')}}" >Categories</a>
        </li>
    </ul>

    <ul class="flex justify-between gap-6">

        <li>
            <a href="" > @yield('user')</a>
        </li>
        <li>
            <form action="{{ route('admin.logout')}}" method="post">
                @csrf
                <button type="submit" >Logout</button>
            </form>
        </li>

    </ul>
</nav>
