@auth
@extends('layout.app')
@section('content')
<style>
  .text-primary {
    color: red; /* Set your desired color here */
  }
  </style>
  
<section class="content">
  <div class="container-fluid">
    <div class="row">
      
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">All Posts</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Trending</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Your Professional</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->

                @foreach ($allPosts as $post)
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ Storage::url($post->user->image) }}" alt="User Avatar">
                    <span class="username">
                      <a href="/user_profile/{{$post->user->id}}">{{ $post->user->fullname}}.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">{{$post->user->username}} - {{$post->created_at->diffForHumans()}}</span>
                  </div>
                  <!-- /.user-block -->
                  <a href="post/{{$post->id}}">
                    <p style="color: #000">
                      
                      {{$post->content}}
                    </p>
                  </a>

                  <p>

                    <a href="#" class="link-black text-sm mr-2 shareButton" data-url="https://example.com/post/123"><i class="fas fa-share mr-1"></i> Share</a>
                    {{-- <a href="#" id="likeButton" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a> --}}
                    <a href="#" id="likeButton" class="link-black text-sm">
                      <i class="far fa-thumbs-up mr-1"></i> 
                      <span id="likeButtonText">Like</span>
                    </a>
                    
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments ({{ $post->comment_count  }})
                      </a>
                    </span>
                  </p>

                  {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
                </div>
                @endforeach
               
                <!-- /.post -->

             
                <!-- /.post -->

                <!-- Post -->
              
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  @foreach ($trendingPosts as $trendingPost)
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ Storage::url($trendingPost->user->image) }}" alt="User Avatar">
                    <span class="username">
                      <a href="/user_profile/{{$trendingPost->user->id}}">{{$trendingPost->user->fullname}}.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">{{$trendingPost->user->username}} - {{$trendingPost->created_at->diffForHumans()}}</span>
                  </div>
                  <!-- /.user-block -->
                  <a href="/post/{{$post->id}}">
                    <p style="color: #000">
                      
                      {{$trendingPost->content}}
                    </p>
                  </a>

                  <p>

                    <a href="#" class="link-black text-sm mr-2 shareButton" data-url="https://example.com/post/123"><i class="fas fa-share mr-1"></i> Share</a>
                    {{-- <a href="#" id="likeButton" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a> --}}
                    <a href="#" id="likeButton" class="link-black text-sm">
                      <i class="far fa-thumbs-up mr-1"></i> 
                      <span id="likeButtonText">Like</span>
                    </a>
                    
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments ({{ $trendingPost->comment_count  }})
                      </a>
                    </span>
                  </p>

                  {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
                </div>
                @endforeach
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName2" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- Add this script after including jQuery library -->
<script>
  $(document).ready(function() {
    $('#likeButton').click(function(event) {
      event.preventDefault(); // Prevent the default link behavior
  
      // Toggle the "text-primary" class on the <i> element to change the color
      $(this).find('i').toggleClass('text-danger');
    });
  });

  $(document).ready(function() {
    $('#likeButton').click(function(event) {
      event.preventDefault(); // Prevent the default link behavior
  
      var postId = "{{ $post->id }}"; // Get the post ID
      var likeButton = $(this);
      var likeCount = $(this).find('.like-count');
      var likeButtonText = $(this).find('#likeButtonText');
  
      $.ajax({
        url: '/like/' + postId, // Replace with your route for adding/removing likes
        method: 'POST', // Use POST method to send data
        dataType: 'json', // Expect JSON response from the server
        success: function(response) {
          if (response.liked) {
            likeButton.addClass('text-danger'); // Add the 'text-danger' class to change the color
            likeButtonText.text('Unlike'); // Change the text to 'Unlike'
            likeCount.text(response.likeCount); // Update the like count
          } else {
            likeButton.removeClass('text-danger'); // Remove the 'text-danger' class
            likeButtonText.text('Like'); // Change the text back to 'Like'
            likeCount.text(response.likeCount); // Update the like count
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText); // Log any errors to the console
        }
      });
    });
  });
  </script>

  
  
  
@endsection

@endauth
