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
                    <h2 class="text-3xl">Edit Questions</h2>
                    <div class="ml-auto">
                      <a class="" href="{{route('questions.index')}}">Back to all  Questions</a>
                    </div>
                  </div>
                  <div class="card-body w-full">
                    <form  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('questions.update',$question->id)}}" method="post">
                      {{method_field('PUT')}}
                      @include('questions._form',['buttonText'=>'Update a Question'])
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
