@extends('master.master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form id="new_blog_form">
                <div class="card shadow">
                    <div class="car-header bg-primary pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Upload New Blog </div>
                    </div>
                    <div class="card-body">
                    <input type="hidden" name="author_id" value="{{ $UserData['id'] }}">
                        <div class="form-group">
                            <label for="title"> Title* </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}"/>
                            <small class="text-danger" id="blog_name_error">Title Field Cannot Be Empty</small>
                        </div>

                        <div class="form-group">
                            <label for="category"> Category* </label>
                            <select name="category" id="category" class="form-control">
                                <option value="" selected disabled>Select Category</option>
                                <option value="Travel">Travel</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Wordpress">Wordpress</option>
                                <option value="Technology">Technology</option>
                                <option value="Science">Science</option>
                                <option value="PHP">PHP</option>
                                <option value="Python">Python</option>
                                <option value="Java">Java</option>
                            </select>
                            <small class="text-danger" id="blog_category_error">Category Field Cannot Be Empty</small>
                        </div>

                        <div class="form-group">
                            <label for="blog_picture">Blog Picture</label>
                            <input type="file" name="blog_picture" id="blog_picture" class="form-control-file" />
                        </div>

                        <div class="form-group">
                            <label for="blog">Blog*</label>
                            <textarea class="form-control" id="blog" name="blog" rows="4"></textarea>
                            <small class="text-danger" id="blog_error">Textarea Field Cannot Be Empty</small>
                          </div>
                          <div class="form-group">
                            <label for="date">Date*</label>
                            <input type="date" id="date" name="date" class="form-control">
                            <small class="text-danger" id="blog_date">Date Field Cannot Be Empty</small>
                          </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection