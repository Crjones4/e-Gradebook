@extends('app')

@section('content')
<body class="bg-gradient-to-r from-blue-300 via-red-500 to-pink-500">
    <div class="container bg-gray-100 md:w-96 text-center rounded m-auto mt-24">
       <p class="py-12 text-lg font-semibold">Sign in to E-Gradebook</p>
       <div class="container pb-12">
            <form method="post" action="{{ route('signin') }}">
               @csrf
               @if (session('status'))
                    <div class="bg-red-500 p-2 rounded-lg mb-6 text-white text-center mx-auto w-3/4">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="text-left m-auto w-3/4">
                    <label for="email" class="block py-2">Email:</label>
                    <input id="email" name="email" type="text" class="rounded-md w-full h-8 border-2 outline-none border-gray-300 px-3 py-5 focus:border-blue-500 @error('email') border-red-500 @enderror" placeholder="Your Email Address">
                    @error('email')
                        <p class="text-red-500 text-sm my-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-left m-auto w-3/4 my-6">
                    <label for="password" class="block py-2">Password:</label>
                    <input id="email" type="password" name="password" class="rounded-md w-full h-8 border-2 outline-none border-gray-300 px-3 py-5 focus:border-blue-500 @error('password') border-red-500 @enderror" placeholder="Your Password">
                    @error('password')
                        <p class="text-red-500 text-sm my-2">{{ $message }}</p>
                    @enderror
                </div>
                <button class="bg-blue-500 text-white py-3 px-4 w-3/4 rounded-lg hover:bg-blue-600" type="submit">Sign in</button>
            </form>
       </div>
    </div>
</body>
@endsection