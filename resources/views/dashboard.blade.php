@auth
@extends('layout.app')
@section('content')
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
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">All Posts</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                @if ($posts->isEmpty())
                  <p>No posts found.</p>
                @else
                  @foreach ($posts as $post)
                    <!-- Post -->
                    <div class="post">
                      <!-- Post content goes here -->
                    </div>
                    <!-- /.post -->
                  @endforeach
                @endif
              </div>
              <!-- /.tab-pane -->

              <!-- Other tab panes -->

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
