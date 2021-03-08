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
              <h2>
                {{$question->answers_count ." ". Str::plural('Answer',$question->answers_count)}}
              </h2>

              @foreach ($question->answers as $answer)
                <div class="media">
                  <hr>
                  <div class="media-body">
                    {{$answer->body}}
                  </div>
                  <hr>
                </div>
              @endforeach
            </div>
            <div class="card-body">
              {!! $question->body_html !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
</x-app-layout>
