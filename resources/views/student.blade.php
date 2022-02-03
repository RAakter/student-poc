@extends('welcome')

@section('content')
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <div class="embed-responsive embed-responsive-16by9">
                    <video width="500" height="300" controls>
                        <source src="{{\Illuminate\Support\Facades\URL::asset($content->video)}}" type="video/mp4">
                    </video>
                </div>
                <div>
                    <h2>{{ $content->createdBy->name }}</h2>
                    <p>{{ $content->description }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-md-8">
                        <h4>Top Responses</h4>
                        <ul class="list-unstyled">
                            @foreach($responses as $response)
                                <li>{{ $response->createdBy->name }}
                                    <span>{{ $response->rating }}</span>
                                </li>
                                @endforeach
                        </ul>
                        <h6>Average Response rating</h6>

                    </div>
                    <div class="col-md-4">
                        <u>View All</u>
                        <ul class="list-unstyled">
                            <li>1</li>
                            <li>2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action-->

        <!-- Content Row-->
        <h3>All Comments</h3>
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 mb-12">


                <div class="card h-100">

                    @foreach($comments as $comment)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="ml-5">

{{--                                        <img src="..." class="rounded mx-auto d-block" alt="...">--}}
                                        <h4>{{ $comment->name }}</h4>
                                        <p>{{ $comment->age }}</p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="container">
                                        <span id="rateMe2"  class="empty-stars"></span>
                                    </div>
                                    <p class="card-text">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                </div>
            </div>

        </div>
        <div>
            <h3 class="mt-5">Add a comment</h3>
            <form class="form-control" action="{{ route('comment.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom01">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Name" value="" name="name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label for="validationCustom02">Age</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="age" value="" name="age" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="email" value="" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Rating</label>
                                    <span id="rateMe1"></span>
                                    <input type="hidden" name="rating" value="4.5">
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comments</label>
                            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="form-row">



                </div>
                <button class="btn btn-light" type="submit">Cancel</button>

                <button class="btn  btn-secondary" type="submit">Submit</button>
            </form>
        </div>
    </div>
    @endsection
