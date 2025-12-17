<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Video</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    .form-control {
        width: 100%;;
    }
</style>
<body class="bg-black">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; padding: 0">
        <div class="card shadow col-md-6 col-lg-5" style="border-radius:  25px 25px 15px 15px; border: none;">
            <div class ="card-header mb-4" style="background-color: #5a1616; border-radius: 20px 20px 0 0; text-align: center; 
            color: white; width:100%; padding: 15px; border-color: #5a1616;  border-width: 5px; border-style: solid;">
                <h4 class="mb-0">Register Website</h4>
            </div>
            {{-- <h3 class="text-center mb-3">Register</h3> --}}

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('videos.store') }}" method="POST" style="margin-bottom: 1rem; width: 100%;">
                @csrf
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <div  class="mb-2">
                <label class="form-label">Title</label><br>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" style="width:100%; padding:0.5rem;">
            </div>

            <div class="mb-2">
                <label for="youtube_url" class="form-label" style="margin-top:0.5rem">YouTube URL Id</label><br>
                <input type="id" name="youtube_id" class="form-control" value="{{ old('youtube_id') }}" placeholder="https://www.youtube.com/watch?v=...">
            </div>

            <div class="mb-2">
                <label for="description" class="form-label">Description</label><br>
                <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-2">
                <select name="category_id" class="form-select " aria-label="Category Select" style="padding-left: 10px;">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Please select a category for the video.</small>
            </div>

            <div class="mb-2">
                <label for="year" class="form-label">Year</label><br>
                <input type="number" name="year" value="{{ old('year') }}" class="form-control">
            </div>

            <div style="display:flex; align-items:center; gap:0.4rem;">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                <label class="form-label">Set as featured</label>
            </div>

            <button class="btn btn-primary w-100" type="submit" style="background-color: #5a1616; margin: 1rem 0;">
                Save
            </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>