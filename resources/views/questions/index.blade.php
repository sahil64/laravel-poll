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
                  <div class="card-header text-3xl pl-1 text-blue-500">
                    All Questions
                  </div>
                  <div class="card-body">
                    @foreach ($questions as $question )
                      <div class="media my-2 py-2">
                        <div class="media-body box-border border-t-2 px-6">
                          <h3 class="mt-2 text-2xl text-blue-700">
                            <a href="{{$question->url}}"> {{$question->title}}</a>
                          </h3>
                          <p class="lead">
                            Asked by 
                            <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                            <small class="text-muted">{{$question->created_date}}</small>
                          </p>
                          <p class="text-blue-900">
                            {{ str_limit($question->body,250)}}
                          </p>
                        </div>
                      </div>

                    @endforeach
                    {{$questions->links()}}
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
