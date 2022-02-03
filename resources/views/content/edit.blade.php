<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Content') }}

            <a href="{{ route('content.index') }}"><button class="btn btn-sm btn-dark" style="float: right;">View list</button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="video">Video File: </label>
                                        <input type="file" class="form-control" id="video"
                                               name="video"
                                               value="{{ old('video', isset($content) ? $content->video : null) }}"
                                               placeholder="Upload">
                                        <span id="video-error" class="form-text text-danger" role="alert">
                                            {{ $errors->first('video') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" name="description">{{ $content->description }}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary text-dark">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
