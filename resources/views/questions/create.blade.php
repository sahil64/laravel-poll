<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <div class="card">
                  <div class="card-header  pl-1 text-blue-500 md:flex">
                    <h2 class="text-3xl">Ask Questions</h2>
                    <div class="ml-auto">
                      <a class="" href="{{route('questions.index')}}">Back to all  Questions</a>
                    </div>
                  </div>
                  <div class="card-body w-full">
                    <form  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('questions.store')}}" method="post">
                      @csrf
                      <div class="w-full justify-self-center rounded-xl border-2 py-4 px-4">
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2" for="Title">
                            Question Title
                          </label>
                          <input  type="text" name="title" value="{{ old('title')}}" id="question-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                          @if($errors->has('title'))
                            <p class="text-red-500 text-xs italic">
                             {{$errors->first('title')}} /Please fill out this field.</p>
                          @endif
                        </div>
                        <div class="mb-4">
                          <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                            Explain your Question
                          </label>
                          <textarea  type="text" name="body" value="{{ old('body')}}" id="question-body" row="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                          @if($errors->has('body'))
                            <p class="text-red-500 text-xs italic">
                              {{$errors->first('body')}} Please fill out this field.</p>
                          @endif
                        </div>
                        <div>
                          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">Ask</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
