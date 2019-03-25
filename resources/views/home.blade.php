@extends('layouts.app')

@section('title', ' - Creating memories, one experience at a time')

@section('content')

    <h4 class="intro">Creating memories, one experience at a time</h4>
    <p>
        Nadia’s Garden Restaurant isn’t just about dining. We’re about creating memorable experiences that our guest will cherish!
        Our family friendly restaurant has indoor, outdoor, and intimate dining options for any occasion.
        Our outdoor garden area is perfect for a stroll before or after your meal. We invite you to come dine with us!
    </p>
    <img src="{{ asset('/images/patio.jpg') }}" class="home" alt="">
    <div class="menu-categories">
        @foreach($categories as $category)
        <article>
            <a href="/menu#{{ Str::slug($category->name) }}"><img src="/images/{{ $category->image }}" alt=""></a>
            <h2><a href="/menu#{{ Str::slug($category->name) }}">{{ ucfirst(trans($category->name)) }}</a></h2>
        </article>
        @endforeach
    </div>
    <div class="social">
        <div class="text-muted">
            <h4>What our customers say</h4>
            <p>
                This place has, without a doubt, some of the best pizza I have ever had!
                The owners are hands on and made sure we had everything we needed.
                They are an eclectic eatery, with a large variety of meals to choose from,
                but everything I’ve tried from their menu has been great.
                It’s definitely a place you have to give a few tries to get a feel for everything they have to offer.
                Oh, and their crème brulee is amazing!<br>
                <br>
                Shad Cayden
            </p>
        </div>
        <div class="networks">
            {{--ul.social-set>li*8>a.social-icon>i.fa.fb-twitter.fa-fw--}}
            <ul class="social-set">
                <li><a href="#" class="social-icon" target="_blank" aria-label="Twitter"><i class="fab fa-twitter fa-fw" title="twitter"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="GitHub"><i class="fab fa-github-square fa-fw" title="GitHub"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="YouTube"><i class="fab fa-youtube fa-fw" title="YouTube"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="Medium"><i class="fab fa-medium fa-fw" title="Medium"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="Instagram"><i class="fab fa-instagram fa-fw" title="Instagram"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-square fa-fw" title="Facebook"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="Flickr"><i class="fab fa-flickr fa-fw" title="Flickr"></i></a></li>
                <li><a href="#" class="social-icon" target="_blank" aria-label="LinkIn"><i class="fab fa-linkedin fa-fw" title="LinkedIn"></i></a></li>
            </ul>
        </div>
    </div>

@endsection
