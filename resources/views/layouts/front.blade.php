<!DOCTYPE HTML>
<!--
	Royale by TEMPLATED
	templated.co @templatedco
        Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
    -->
<html>
<head>
    <title>Royale by TEMPLATED</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('js/skel.min.js') }}"></script>
    <script src="{{ asset('js/skel-panels.min.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/skel-noscript.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css')  }}" />
        <link rel="stylesheet" href="{{ asset('css/style-desktop.css') }}" />
    </noscript>
    <!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('css/ie/v8.css') }}" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('css/ie/v9.css') }}" /><![endif]-->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/style-desktop.css') }}" />
</head>
<body class="homepage">

<!-- Header -->
    @include("front.header")
<!-- Header -->

<!-- Banner -->
<div id="banner">
    <div class="container">


    </div>
</div>
<!-- /Banner -->

<!-- Main -->
<div id="main">
    <div class="container">
        <select name="" id="category_select">
            <option value="/">All Categories</option>
            @foreach($categories as $cat)
                <option value="/category/{{ $cat->alias }}/" @if(isset($category)) @if($category->id == $cat->id) selected @endif @endif>{{ $cat->title }}</option>
            @endforeach
        </select>
    </div>
    <div id="portfolio" class="container">
        <div class="row">
            @foreach($articles as $article)
            <section class="3u">
                <header>
                    <h2>{{ $article->title }}</h2>
                </header>
                <a href="#" class="image full"><img src="{{ $article->image->url }}" alt=""></a>
                <p>{{ strip_tags(substr($article->description, 0, 150)) }}...</p>
                <a href="#" class="button">Read More</a>
            </section>
            @endforeach
        </div>
    </div>
    @if(isset($pagination))
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <ul class="pagination">
                @if($pagination["prev"]>=0)<li class="page-item"><a class="page-link" href="/category/{{$category->alias}}/{{ $pagination["prev"] }}">Previous</a></li>@endif
                @for($i = 0; $i <= $pagination["items"]; $i++)
                        <li class="page-item @if($pagination["page"] == $i) active @endif"><a class="page-link" href="/category/{{$category->alias}}/{{ $i }}">{{ $i+1 }}</a></li>
                @endfor
                @if($pagination["next"]<=$pagination["items"])<li class="page-item"><a class="page-link" href="/category/{{$category->alias}}/{{ $pagination["next"] }}">Next</a></li>@endif
            </ul>
        </div>
    </div>
    @endif
    <!-- Welcome -->
    <div id="welcome" class="container">
        <div class="divider"></div>
        <div class="row">
            <section>
                <header>
                    <h2>Gravida nibh quis urna</h2>
                </header>
                <p>This is <strong>Royale</strong>, a responsive HTML5 site template freebie by <a href="http://templated.co">TEMPLATED</a>. Released for free under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so use it for whatever (personal or commercial) &ndash; just give us credit! Check out more of our stuff at <a href="http://templated.co">our site</a> or follow us on <a href="http://twitter.com/templatedco">Twitter</a>.</p>
                <p>Consectetuer adipiscing elit. Nam pede erat, porta eu, lobortis eget, tempus et, tellus. Etiam neque. Vivamus consequat lorem at nisl. Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet at, ultrices eget, ornare et, wisi. Pellentesque adipiscing purus ac magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque pede. Donec pulvinar ullamcorper metus. In eu odio at lectus pulvinar mollis. Vestibulum sem magna, elementum ut, vestibulum eu, facilisis quis, arcu. Mauris a dolor. Nulla facilisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed blandit. Phasellus pellentesque, ante nec iaculis dapibus, eros justo auctor lectus, a lobortis lorem mauris quis nunc. Praesent pellentesque facilisis elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
            </section>
        </div>
    </div>
    <!-- /Welcome -->

</div>
<!-- /Main -->

<!-- Footer -->
<div id="footer">
    <div class="container">
        <section>
            <header>
                <h2>Pellentesque vulputaterisus semper</h2>
                <span class="byline">In posuere eleifend semper augue maecenas ligula congue rutrum</span>
            </header>
            <div class="row">
                <section class="4u">
                    <a href="#" class="image full"><img src="/images/pics03.jpg" alt=""></a>
                </section>
                <section class="4u">
                    <a href="#" class="image full"><img src="/images/pics04.jpg" alt=""></a>
                </section>
                <section class="4u">
                    <a href="#" class="image full"><img src="/images/pics05.jpg" alt=""></a>
                </section>
            </div>
            <a href="#" class="button">Nulla luctus eleifend</a>
        </section>
    </div>
</div>
<!-- /Footer -->

<!-- Copyright -->
<div id="copyright">
    <div class="container">
        Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
    </div>
</div>
<script src="{{ asset('/js/front.js') }}"></script>
</body>
</html>