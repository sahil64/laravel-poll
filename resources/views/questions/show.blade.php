<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

<div class="container px-5">
  <div class="row justify-content-center">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h2>Title:{{ $question->title }}</h2>
            </div>
            <div class="card-body">
              <p>Description:{{ $question->body }}</p>
            </div>
            <div >
              <h2 class="card-title"> 
                {{$question->answers_count ." ". Str::plural('Answer',$question->answers_count)}}
              </h2>
            </div>
            @foreach ($question->answers as $answer)
              <div class="media p-4 border-1">
                <div class="media-body">
                  {{$answer->body}}
                  <div class="col-2 float-right">
                    <span class="text-muted">{{$answer->created_date}}</span>
                    <div class="media row">
                      <a href="{{$answer->user->url}}" class="col-md-4 px-0">
                        <img width="24" src="{{$answer->user->avator}}" />
                      </a>
                      <div class="media-body col-md-8 px-0">
                        <a href="{{$answer->user->url}}" class="col-md-12">
                          {{$answer->user->name}}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
</x-app-layout>
