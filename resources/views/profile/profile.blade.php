@extends('layouts.app')

@section('content')

    <div class="container emp-profile">
        <div class="card">
            <form action="{{ route('profile.update') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                                alt="" />
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                {{ Auth::user()->name }}
                            </h5>
                            <h6>
                                Web Developer and Designer
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Show</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Edit</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        {{-- <a class="profile-edit-btn"
                            href="{{ route('profile.update') }}">test</a> --}}
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>All POSTS OF {{ Auth::user()->name }}</p>

                            @foreach ($posts as $item)
                                <a href="{{ route('post.show', $item->slug) }}">{{ $item->title }}</a>
                            @endforeach
                            <p>All SKILLS OF {{ Auth::user()->name }}</p>
                            @foreach ($user->skill as $item)
                                <a>{{ $item->skill }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->telefoon }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Bio</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->profile->bio }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Link</label>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ $user->profile->link }}">{{ $user->profile->link }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="test" name="name" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="tel" name="telefoon" value="{{ $user->profile->telefoon }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Bio</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="bio" value="{{ $user->profile->bio }}">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Link</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="link" id="" cols="23"
                                                rows="4">{!!  $user->profile->link !!}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Skills</label>
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($skills as $item)
                                                <input type="checkbox" name="skills[]" value="{{ $item->id }}" @foreach ($user->skill as $item2)
                                                @if ($item->id == $item2->id)
                                                    checked
                                                @endif
                                            @endforeach
                                            placeholder="Text">
                                            <label>{{ $item->skill }}</label>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <label>Sort</label>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($user->sort_id == 0)
                                                @foreach ($sorts as $item)
                                                    <input type="radio" name="sort" value="{{ $item->id }}"
                                                        placeholder="Text">
                                                    <label>{{ $item->sort }}</label>
                                                @endforeach
                                            @else
                                                @foreach ($sorts as $item)
                                                    <input type="radio" name="sort" value="{{ $item->id }}"
                                                    @if ($item->id == $user->sort_id)
                                                        checked
                                                    @endif
                                                placeholder="Text">
                                                <label>{{ $item->sort }}</label>
                                            @endforeach
                                            @endif

                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="profile-edit-btn" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
