<html>
<head>
    <title>

    </title>
</head>
<header>
    <h1>ZZZZZZ. </h1>
@foreach($articles as $article)
        <article>
            <h2>{{ $article->title }}</h2>

            <div class="body">{{ $article }}</div>
        </article>
@endforeach
</header>
<body>
<a href="#">VKKK</a>
<p>
    corresponds to your MySQL server version for the right syntax to use near 'published_at) null, `updated_at` timest
    amp(published_at) null) default character' at line 1 (SQL: create table `"articles"` (`id` int unsigned not null au
    to_increment primary key, `title` varchar(255) not null, `bodyy` text not null, `created_at` timestamp null, `updat
    ed_at` timestamp null, `created_at
</p>
</body>
</html>