<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../resources/css/app.css">
  <title>Home</title>
</head>
<body>
  
  <div class="container" style="width: 100%; display: flex; align-items: center; flex-direction: column;">
    <form action="logout">
      <button>logout</button>
    </form>
    <button id="myBtn" type="button">Create post</button>

    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <form action="create_post" method="post">
          @csrf
          <h2>Create a post</h2>
          <input name="title" type="text" placeholder="Title">
          <textarea name="body" placeholder="Write something..."></textarea>
          <button>Create post</button>
        </form>
      </div>
    </div>
    <h2>Posts</h2>
    @foreach($posts as $post)
      <div class="posts" style="display: flex; flex-flow: column; align-items: center; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px; width: 25%; margin: 20px; padding: 10px;">
        <div class="title">
          <h3 style="padding: 0; margin:10px;">{{$post['title']}}</h3>
        </div>
        <div class="body" style="padding: 0; margin:10px;">
          {{$post['body']}}
        </div>
        <form action="edit/{{$post->id}}">
          @csrf
          <button>Edit</button>
        </form>
        <form action="{{ route('delete-post', $post) }}">
          @csrf
          @method('DELETE')
          <button>Delete</button>
        </form>
      </div>
    @endforeach 
  </div>
</body>
<script src="../resources/js/app.js"></script>
</html>
