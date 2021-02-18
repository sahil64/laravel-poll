@csrf
<div class="w-full justify-self-center rounded-xl border-2 py-4 px-4">
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="Title">
      Question Title
    </label>
    <input  type="text" name="title" value="{{ old('title',$question->title)}}" id="question-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @if($errors->has('title'))
      <p class="text-red-500 text-xs italic">
       {{$errors->first('title')}} /Please fill out this field.</p>
    @endif
  </div>
  <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
      Explain your Question
    </label>
    <textarea  type="text" name="body" value="" id="question-body" row="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('body',$question->body)}}</textarea>
    @if($errors->has('body'))
      <p class="text-red-500 text-xs italic">
        {{$errors->first('body')}} Please fill out this field.</p>
    @endif
  </div>
  <div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
      {{$buttonText}}
    </button>
  </div>
</div>
