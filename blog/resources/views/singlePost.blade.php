<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Post {{$post->id}}</title>
</head>
<body>
  <div class="content" style="display: flex;width: 100%; justify-content: center;">
    <div class="singlePost"style="display: flex; flex-flow: column; align-items: center; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px; width: 25%; margin: 20px; padding: 10px;">
      <h1>Edit post</h1>
      <form action="{{ route('edit-post', $post) }}" method="post" style="display: flex; flex-direction: column; width: 80%;">
        @csrf
        <input style="margin: 20px; padding: 10px;" name="title" type="text" placeholder="title" value="{{$post->title}}">
        <textarea style="resize: none; height: 150px;margin: 20px; padding: 10px;" name="body" placeholder="type something...">{{$post->body}}</textarea>
        <button style="margin: 20px; padding: 10px;"">Save</button>
      </form>
    </div>
  </div>
</body>
</html>