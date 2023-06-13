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
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">For You</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Trending</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Professionals</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                @if ($post->count() > 0)
                      
                  @foreach ($post as $postpro)
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{ Storage::url($postpro->user->image) }}" alt="User Avatar">
                      <span class="username">
                        <a href="/user_profile/{{$postpro->user->id}}">{{ $postpro->user->fullname}}.</a>
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                      </span>
                      <span class="description">{{$postpro->user->username}} - {{$postpro->created_at->diffForHumans()}}</span>
                    </div>
                    <!-- /.user-block -->
                    <a href="post/{{$postpro->id}}" style="color: #000">
                      <p style="color: #000">
                        
                        {!! $postpro->content !!}
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
                          <i class="far fa-comments mr-1"></i> Comments ({{ $postpro->comment_count}})
                        </a>
                      </span>
                    </p>

                    {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
                  </div>
                  @endforeach
                @else
                    <p>Nothing</p>
                @endif
               
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
                  <a href="/post/{{$trendingPost->id}}" style="color: #000">
                    <p style="color: #000">
                      
                      {!! $trendingPost->content !!}
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

                @foreach ($professionals as $professional)
                    <a href="professional_posts/{{$professional->id}}">
                      <p>{{ $professional->name }}</p>
                    </a>
                @endforeach

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


  
@endsection

@endauth
