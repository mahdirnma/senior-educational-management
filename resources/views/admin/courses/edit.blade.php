@extends('layout.app')
@section('title')
    update course
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">update course</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('courses.update',compact('course'))}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    @method('put')
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="title" class="font-semibold ml-5">: title</label>
                            <input type="text" name="title" value="{{$course->title}}" id="title" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('title')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="description" class="font-semibold ml-5">: description</label>
                            <textarea name="description" id="description" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{$course->description}}</textarea>
                            @error('description')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="capacity" class="font-semibold ml-5">: capacity</label>
                            <input type="number" name="capacity" min="1" max="50" value="{{$course->capacity}}" id="capacity" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('capacity')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="professor_id" class="font-semibold ml-5">: professor</label>
                            <select name="professor_id" id="professor_id" class="w-2/5 h-8 rounded outline-0 px-2 border border-gray-400">
                                @foreach($professors as $professor)
                                    <option value="{{$professor->id}}" {{$course->professor_id==$professor->id?'selected':''}}>{{$professor->name}}</option>
                                @endforeach
                            </select>
                            @error('professor_id')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
