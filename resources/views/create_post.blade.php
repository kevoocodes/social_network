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
                <h2>Add Post</h2>
          </div>
          <div class="card-body">
                       
            <form action="" method="POST" enctype="multipart/form-data">
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
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control" id="editor" cols="30" rows="10"></textarea>
                    @error('content')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Choose Professional</label>
                    <select class="form-control" name="professional_id" id="">
                      
                          @foreach ($professionals as $professional)
                                 <option value="{{ $professional->id }}">{{ $professional->name }}</option> 
                          @endforeach
                        
                    </select>
                    @error('professional_id')
                    <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
      
                  {{-- <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file"name="image" value=""  class="form-control" id="inputPassword3" placeholder="Lastname">
                      @error('image')
                           <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> --}}
                  <button type="submit" class="btn btn-info">Add Post</button>
            </form>
        
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
