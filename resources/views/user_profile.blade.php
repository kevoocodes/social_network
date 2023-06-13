@auth
@extends('layout.app')
@section('content')

   <!-- Main content -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-md-8">
              <div class="active tab-pane" id="activity">
         
                  <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header">
                        <h3 class="widget-user-username">{{ $usersProfile->fullname }}</h3>
                        <h5 class="widget-user-desc">{{$usersProfile->username}}</h5>
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ Storage::url($usersProfile->image) }}" alt="User Avatar">
                      </div>
                      <div class="card-footer">
                        <div class="row">
                  

                          <table class="table">
                            <tbody>
                              <tr>
                                <th scope="row">Phonenumber</th>
                                <td>{{ $usersProfile->phonenumber }} </td>
                              </tr>

                              <tr>
                                <th scope="row">Email</th>
                                <td>{{ $usersProfile->email }} </td>
                              </tr>
                              
                            </tbody>
                          </table>
                          <!-- /.col -->

                          @foreach ($posts as $post)
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="post">
                                  <div class="user-block">

                                    <img class="img-circle elevation-2" src="{{ Storage::url($post->user->image) }}" alt="User Avatar">
                                    
                                    <span class="username">
                                      <a href="/Customer/user-profile/{{$post->user->id}}">{{ $post->user->fullname  }}</a>
                                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <span class="description">{{$post->user->username}} - {{$post->created_at->diffForHumans()}}</span>
                                  </div>
                                  <!-- /.user-block -->
                                  <a href="/post/{{$post->id}}" style="color: #000">
                                    <p style="color: #000">                 
                                      {!!$post->content!!}
                                    </p>
                                  </a>
                                
                  
                                  <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                    <span class="float-right">
                                      <a href="#" class="link-black text-sm">
                                        <i class="far fa-comments mr-1"></i> Comments ({{ $comments[$post->id] ? count($comments[$post->id]) : 0 }})
                                      </a>
                                    </span>
                                  </p>
                  
                                  
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

@endsection

@endauth
