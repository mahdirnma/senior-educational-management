@extends('layout.app')
@section('title')
    collegians
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('collegians.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add collegian +</a>
                <h2 class="text-xl">collegians</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">delete</td>
                        <td class="text-center">update</td>
                        <td class="text-center">gender</td>
                        <td class="text-center">age</td>
                        <td class="text-center">phone number</td>
                        <td class="text-center">name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collegians as $collegian)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('collegians.destroy',compact('collegian'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600 cursor-pointer">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('collegians.edit',compact('collegian'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-cyan-600 cursor-pointer">update</button>
                                </form>
                            </td>
                            <td class="text-center">{{$collegian->gender}}</td>
                            <td class="text-center">{{$collegian->age}}</td>
                            <td class="text-center">{{$collegian->phoneNumber}}</td>
                            <td class="text-center">{{$collegian->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$collegians->links()}}</div>
        </div>
@endsection
