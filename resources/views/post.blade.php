@auth
@extends('layout.app')
@section('content')

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-md-8">
              <!-- Box Comment -->
              <div class="card card-widget">
                <div class="card-header">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ Storage::url($post->user->image) }}" alt="User Avatar">
                    <span class="username"><a href="/Customer/user-profile/{{$post->user->id}}">{{$post->user->fullname }}</a></span>
                    <span class="description">{{$post->user->username}} - {{$post->created_at->diffForHumans()}}</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" title="Mark as read">
                      <i class="far fa-circle"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- post text -->
                  <p>{!! $post->content !!}</p>
  
              
          
  
                  <!-- Social sharing buttons -->
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                  <span class="float-right text-muted  mb-4">45 likes - {{$post->comment_count}} comments</span>
                  <form class="form-horizontal" action="{{route('comment.store', ['id' => $post->id])}}" method="POST">
                    @csrf
                      <div class="input-group input-group-sm mb-0">
                        <img class="img-fluid img-circle img-sm" src="{{ Storage::url(auth()->user()->image) }}" alt="User Avatar">
                        <input type="text" name="comment" class="form-control form-control-sm" placeholder="Response">
                             
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-danger" value="send">
                          {{-- <button type="submit" name="submit" class="btn btn-danger">Send</button> --}}
                        </div>
                        <br>
                      
                 </div>
                      @if ($errors->has('comment'))
                      <div class="error text-danger">
                      {{ $errors->first('comment')}}
                      </div>
                      @endif
                  </form>
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer card-comments">
                  @if (count($comments) > 0)
                      @foreach ($comments as $comment)
                      <div class="card-comment">
                        <!-- User image -->

                        <img class="img-circle img-sm" src="{{ Storage::url($comment->user->image) }}" alt="User Avatar">
      
                        <div class="comment-text">
                          <span class="username">
                            <a href="/profile/{{$comment->user->id}}">
                               {{$comment->user->fullname}}
                            </a>
                            
                            <span class="text-muted float-right">{{$comment->created_at->diffForHumans()}}</span>
                          </span><!-- /.username -->
                          {{$comment->comment}}
                        </div>
                        <!-- /.comment-text -->
                      </div>
                    @endforeach
                  @else
                      <p class="text-center">No comment yet</p>
                  @endif
               
                

                  <!-- /.card-comment -->
                </div>
                <!-- /.card-footer -->
              
                <div class="card-footer">
               
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      

      <!-- OTHERS DASHBOARD STAFFS IS HERE -->


      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>

@endsection

@endauth
