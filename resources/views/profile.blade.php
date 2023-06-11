@auth
@extends('layout.app')
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      

          <div class="col-md-8">
            <div class="active tab-pane" id="activity">
       
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    @if (session('success'))
                      <div class="alert alert-success">
                          {{session('success')}}
                      </div>
                    @endif
                    <div class="widget-user-header">
                      <h3 class="widget-user-username">{{ auth()->user()->fullname }}</h3>
                      <h5 class="widget-user-desc">{{auth()->user()->username }}</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                

                        <table class="table">
                          <tbody>
                            <tr>
                              <th scope="row">Phonenumber</th>
                              <td>{{ auth()->user()->phonenumber  }} </td>
                            </tr>

                            <tr>
                              <th scope="row">Email</th>
                              <td>{{ auth()->user()->email  }} </td>
                            </tr>
                            
                          </tbody>
                          
                        </table>

                        <div class="card col-md-12">
                  
                          <div class="card-body">
                            <a href="update_profile" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                          </div>
                        </div>
                        <!-- /.col -->

                        @foreach ($posts as $post)
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="post">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="{{asset('assets/dist/img/user1-128x128.jpg')}}" alt="user image">
                                  <span class="username">
                                    <a href="user_profile/{{$post->user->id}}">{{ $post->user->fullname  }}</a>
                                    <a href="" class="float-right btn-tool">
                                      <form action="{{route('post.destroy', $post->id )}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none">
                                          <i class="fas fa-trash"></i>
                                        </button>
                        
                                       </form>
                                    
                                    </a>
                                 

                                   
                                  </span>
                                  <span class="description">{{$post->user->username}} - {{$post->created_at->diffForHumans()}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                
                                  {{$post->content}}
                                  
                                </p>
                
                                <p>
                                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                  <span class="float-right">
                                    <a href="#" class="link-black text-sm">
                                      <i class="far fa-comments mr-1"></i> Comments (5)
                                    </a>
                                  </span>
                                </p>
                
                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>

            </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      



      <!-- OTHERS DASHBOARD STAFFS IS HERE -->


      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /section -->

@endsection

@endauth
