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
                    <h2 class="text-3xl">All Questions</h2>
                    <div class="ml-auto">
                      <a class="" href="{{route('questions.create')}}">Ask Question</a>
                    </div>
                  </div>
                  <div class="card-body">
                    @foreach ($questions as $question )
                      <div class="media my-2 py-2 md:flex border-t-2 ">
                        <div class="flex flex-wrap py-3 counters md:flex md:w-34">
                          <div class="votes">
                            <strong>{{$question->votes}}</strong> {{str_plural('vote',$question->votes)}}
                          </div>
                          <div class="status {{$question->status}}">
                            <strong>{{$question->answers_count}}</strong> {{str_plural('answer',$question->answers_count)}}
                          </div>
                          <div class="view">
                            {{$question->views.' '. str_plural('view',$question->views)}}
                          </div>
                        </div>
                        <div class="media-body box-border px-6">
                          <div class="flex">
                            <h3 class="mt-2 text-2xl text-blue-700">
                              <a href="{{$question->url}}"> {{$question->title}}</a>
                            </h3>
                            <div class="ml-auto">
                              {{-- @if(Auth::user()->can('update-question',$question)) Using Gates--}}
                              {{--@if(Auth::user()->can('update',$question)) using POlicies--}}
                              @can('update',$question)
                                <a class="btn border-4 rounded-lg px-4 py-2" href="{{route('questions.edit', $question->id)}}">Edit</a>
                              @endcan 
                              {{--@endif--}}
                              
                              {{--@if(Auth::user()->can('delete-question',$question)) Using Gates --}}
                              {{--@if(Auth::user()->can('delete',$question)) Policies--}}
                              @can('delete', $question)
                                <form method="post" action="{{route('questions.destroy',$question->id)}}">
                                  @method('DELETE')
                                  @csrf()
                                  <button type="submit" class="btn border-4 rounded-lg px-4 py-2" onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                              @endcan

                              {{--@endif--}}
                            </div>        
                          </div>
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
