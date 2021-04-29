@extends('admin.base')
@section('root')
<div class="container bg-gray-100 mx-auto sm:w-1/3 text-center mt-16 rounded-xl">
    <form action="{{ route('admin-usernew') }}" method="get">
        <button class="bg-blue-500 text-white py-3 px-4 w-3/4 rounded-lg hover:bg-blue-600 my-10" type="submit">Create a new user</button>
    </form>
</div>
<div class="mt-20 flex items-center px-4">
    <div class='overflow-x-auto w-full'>
        <table class='mx-auto sm:w-3/4 whitespace-nowrap rounded-md bg-gray-300 divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-400">
                <tr class="text-gray-600 text-center">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Email
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Role
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Edit
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Grades
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="py-4">
                        {{$user->name}}
                    </td>    
                    <td class="py-4">
                        {{$user->email}}
                    </td>
                    <td class="py-4 text-center">
                            @if ($user->role == "admin")
                                <span class="text-white bg-yellow-200 font-semibold px-2 rounded-full">
                                Administrator 
                            @else
                                <span class="text-gren-800 bg-green-200 font-semibold px-2 rounded-full">
                                Student
                            @endif
                        </span>
                    </td>
                    <td class="py-4 text-center">
                        <a href="{{ route('admin-useredit', $user->id) }}" class="text-purple-800 rounded-lg p-2 hover:bg-gray-400">&middot; &middot; &middot;</a>
                    </td>
                    <td class="py-4 text-center">
                        @if($user->role == "student")
                            <a href="{{ route('admin-usergrades', $user->id) }}" class="text-purple-800 rounded-lg p-2 hover:bg-gray-400">&middot; &middot; &middot;</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection