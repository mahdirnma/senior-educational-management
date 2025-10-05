@extends('layout.app')
@section('title')
    courses
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{--{{route('courses.create')}}--}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add course +</a>
                <h2 class="text-xl">courses</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">capacity</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td class="text-center">{{$course->capacity}}</td>
                            <td class="text-center">{{$course->description}}</td>
                            <td class="text-center">{{$course->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{--            <div class="mt-5">{{$courses->links()}}</div>--}}
        </div>
@endsection
