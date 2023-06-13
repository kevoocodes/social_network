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
          <div class="card-header">
            <h4>{{ $professional->name }} Professional</h4>
          </div>
          <div class="card-body">
            
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->

                @if ($posts->isEmpty())
                    <p>No Posts Found on this professional</p>
                @else
                  @foreach ($posts as $post)
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
                    <a href="/post/{{$post->id}}" style="color: #000">
                      <p style="color: #000">
                        
                        {!! $post->content !!}
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
                @endif
                
               
                <!-- /.post -->

             
                <!-- /.post -->

                <!-- Post -->
              
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

             
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


  

  
@endsection

@endauth
