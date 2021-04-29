@extends('dashboard.base')
@section('root')
<div class="mt-20">
@if($grades->count())
    @foreach ($grades as $grade)
        <div class="bg-gray-100 max-w-md mt:w-1/3 rounded-lg m-auto p-5 mt-10">
            <p class="text-lg font-semibold text-left inline float-left">{{ $grade->teacher()->get()->first()->name }}</p>
            <p class="inline text-right float-right">{{ $grade->grade }}/100</p>
            <p class="mt-12 text-left w-full">{{ $grade->comment }}</p>
        </div>
    @endforeach
@else
    <p>No comments or grades yet.</p>
@endif
</div>
@endsection