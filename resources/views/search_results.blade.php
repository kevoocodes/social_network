@auth
@extends('layout.app')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
                       
           <!-- search_results.blade.php -->
           <h2>Professional Search result</h2>
                @if ($professionals->count() > 0)
                @foreach ($professionals as $professional)
                  <a href="/professional_posts/{{$professional->id}}">
                    <p class="text-dark">
                        {{$professional->name}}
                    </p>
                  </a>
                @endforeach
                @else
                    <p>No Professional Found</p>
                @endif

            <h4>User Search Results</h4>
                @if ($users->count() > 0)
                    <ul>
                        @foreach ($users as $user)
                        
                            <div  class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{ $user->username }}
                                      </div>
                                  <div class="card-body pt-0">
                                    <div class="row">
                                      <div class="col-7">
                                        <h2 class="lead"><b>{{ $user->fullname }}</b></h2>
                                        {{-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> --}}
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: {{ $user->email }}</li>
                                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->phonenumber }}</li>
                                        </ul>
                                      </div>
                                      <div class="col-5 text-center">
                                        <img src="{{ Storage::url($user->image) }}" alt="user-avatar" class="img-circle img-fluid">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <div class="text-right">
                                      {{-- <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                      </a> --}}
                                      <a href="/user_profile/{{$user->id}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </ul>
                @else
                    <p>No users found.</p>
                @endif

                <hr>

                <h4>Post Search Results</h4>
                @if ($posts->count() > 0)
                    <ul>
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
                                    <a href="post/{{$post->id}}" style="color: #000">
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
                    </ul>
                @else
                    <p>No posts found.</p>
                @endif

                

        
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
  </script>
@endsection

@endauth
