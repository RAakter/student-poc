<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Content') }}

            <a href="{{ route('content.create') }}"><button class="btn btn-sm btn-dark" style="float: right;">Create New</button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Video</th>
                                <th>Description</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>
                                        <video width="320" height="240" controls>
                                            <source src="{{\Illuminate\Support\Facades\URL::asset($content->video)}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>{{ $content->description }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
{{--                    {{ $contents->links() }}--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
