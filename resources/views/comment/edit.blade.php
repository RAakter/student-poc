<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Comment') }}

            <a href="{{ route('comment.index') }}"><button class="btn btn-sm btn-dark" style="float: right;">View list</button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Positive</option>
                                        <option value="0">Negative</option>
                                    </select>
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
