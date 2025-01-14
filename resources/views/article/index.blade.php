<ul>
    @foreach($articles as $article)
        <li>
           <p>({{$article->id}}}):{{$article->title}} ({{$article->status}})</p>
        </li>
    @endforeach
</ul>

{{$articles->links()}}
