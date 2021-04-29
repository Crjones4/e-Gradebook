@extends('app')

@section('header')
@yield('header')
@endsection

@section('content')
<body class="bg-gray-50">
    <div class="w-full mx-auto text-right inline-block bg-gradient-to-r from-red-50 via-red-500 to-gray-500">
        <div class="inline-block float-left ml-10 h-12 pt-2">
            <p class="text-xl text-black inline ml-2">E-Gradebook</p>
        </div>
        <ul>
            <li class="inline"><p class="inline text-white">Welcome, {{ auth()->user()->name }}</p></li>
            <li class="inline"><form action="{{ route('logout') }}" method="post" class="block md:inline-block">
                @csrf
                <button class="px-6 py-1 text-white mx-2 bg-blue-600 rounded mt-2" type="submit">Log out</button>
            </form>
            <li>
        </ul>
    </div>
    <div class="container md:w-3/4 text-center rounded m-auto">
        @yield('root')
    </div>
</body>
@endsection