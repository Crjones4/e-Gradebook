@extends('admin.base')
@section('root')

@if(session('success'))
<div class="bg-green-400 container w-3/4 py-3 px-2 text-center rounded-xl m-auto vertical-center mt-10 flex">
    <div class="m-auto">
        <p class="font-semibold text-white font-md">{{ session('success') }}</p>
    </div>
</div>
@endif
<div class="container bg-gray-100 mx-auto max-w-md mt:w-1/3 pb-16 text-center mt-16 rounded-xl">
<form action="{{ route('admin-usernew') }}" method="post">
        <p class="text-2xl font-semibold text-gray-600 pt-8">New user</p>
        <div class="container text-left px-5 m-auto">
            @csrf
            <label for="name" class="block">Name: </label>
            <input type="text" id="name" name="name" class="rounded-lg outline-none border-2 border-gray-300 h-9 w-full px-3 py-1 mt-5 focus:border-blue-500" placeholder="Name">
            @error('name')
                <p class="text-red-500 text-sm my-2 text-center">{{ $message }}</p>
            @enderror
            <div class="spacer mt-5"></div>
            <label for="email" class="block">Email: </label>
            <input type="text" id="email" name="email" class="rounded-lg outline-none border-2 border-gray-300 h-9 w-full px-3 py-1 mt-5 focus:border-blue-500" placeholder="Email">
            @error('email')
                <p class="text-red-500 text-sm my-2 text-center">{{ $message }}</p>
            @enderror
            <div class="spacer mt-5"></div>
            <label for="email" class="block">Role: </label>
            <select id="role" class="rounded-lg outline-none border-2 border-gray-300 h-9 w-full px-3 py-1 mt-5 focus:border-blue-500" style="-webkit-appearance:none;" name="role">
                <option value="admin">Administrator</option>
                <option value="student">Student</option>
            </select>
            @error('role')
                <p class="text-red-500 text-sm my-2 text-center">{{ $message }}</p>
            @enderror
            <div class="spacer mt-5"></div>
            <p class="text-center">A random password will be generated and emailed to the user.</p>
            <div class="spacer mt-5"></div>
        </div>
        <button class="bg-blue-500 text-white py-3 px-4 w-3/4 rounded-lg hover:bg-blue-600 mt-10" type="submit">Create</button>
    </form>
</div>
@endsection