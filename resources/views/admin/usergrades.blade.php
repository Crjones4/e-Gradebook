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
<form action="{{ route('admin-usergrades',$user->id) }}" method="post">
        <p class="text-2xl font-semibold text-gray-600 pt-8">Post about {{ $user->name }}</p>
        <div class="container text-left px-5 m-auto">
            @csrf
            <label for="grade" class="block">Their grade: </label>
            <input type="number" id="grade" name="grade" class="rounded-lg outline-none border-2 border-gray-300 h-9 w-full px-3 py-1 mt-5 focus:border-blue-500" placeholder="0 to 100">
            @error('grade')
                <p class="text-red-500 text-sm my-2 text-center">{{ $message }}</p>
            @enderror
            <div class="spacer mt-5"></div>
            <label for="comment" class="block">Your comment: </label>
            <textarea type="text" id="comment" name="comment" class="rounded-lg outline-none border-2 border-gray-300 min-h-20 w-full px-3 py-1 mt-5 focus:border-blue-500" placeholder="Your comment about the student goes here..."></textarea>
            @error('comment')
                <p class="text-red-500 text-sm my-2 text-center">{{ $message }}</p>
            @enderror
        </div>
        <button class="bg-blue-500 text-white py-3 px-4 w-3/4 rounded-lg hover:bg-blue-600 mt-10" type="submit">Publish</button>
    </form>
</div>

<div class="mt-20">
@if($grades->count())
    @foreach ($grades as $grade)
        <div class="bg-gray-100 max-w-md mt:w-1/3 rounded-lg m-auto p-5 mt-10">
            <p class="text-lg font-semibold text-left inline float-left">{{ $grade->teacher()->get()->first()->name }}</p>
            <p class="inline text-right float-right">{{ $grade->grade }}/100</p>
            <p class="mt-12 text-left w-full">{{ $grade->comment }}</p>
            @if ($grade->teacher()->get()->first()->id == auth()->user()->id)
                <form action="{{ route('admin-usergrades',$user->id) }}" method="post">
                    <input type="text" hidden name="_method" value="DELETE">
                    <input type="text" hidden name="grade_id" value="{{ $grade->id }}">
                    @csrf
                    <button class="bg-red-500 text-white py-3 px-4 w-full rounded-lg hover:bg-red-600 mt-10" type="submit">Delete</button>
                </form>
            @endif
        </div>
    @endforeach
@else
    <p>No comments or grades yet.</p>
@endif
</div>
@endsection