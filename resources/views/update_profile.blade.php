@auth
@extends('layout.app')
@section('content')

  <!-- Main content -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-md-12">
              <div class="card card-info">
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="form-horizontal" method="POST" action="">
                      @if (session('success'))
                              <div class="alert alert-success">
                                  {{session('success')}}
                              </div>
                      @elseif (session('error'))
                          <div class="alert alert-danger">
                                  {{session('error')}}
                          </div>
                      @endif
                  @csrf
                  
                  <div class="card-body">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-10">
                          <input type="text" name="fullname" value="{{auth()->user()->fullname}}" class="form-control" id="inputEmail3" placeholder="Firstname">
                          @error('fullname')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    

                      <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">username</label>
                          <div class="col-sm-10">
                            <input type="text"name="username" value="{{auth()->user()->username}}"  class="form-control" id="inputPassword3" placeholder="Username" readonly>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email"name="email" value="{{auth()->user()->email}}"  class="form-control" id="inputPassword3" placeholder="Email" readonly>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Phonenumber</label>
                          <div class="col-sm-10">
                            <input type="text"name="phonenumber" value="{{auth()->user()->phonenumber}}"  class="form-control" id="inputPassword3" placeholder="Phonenumber">
                          @error('phonenumber')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                          </div>
                        </div>
                    
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-info">Update</button>
                    </div>
                    <!-- /.card-footer -->
              </form>
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
