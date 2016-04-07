@if($events->count() <= 0)
   <p>This list is empty.</p>
@endif
<ul>
    @foreach($events as $event)
        <li>
            @if(@$show_signup_links)
                <a href="/event/{{$event->id}}/register">Sign Up</a>
            @endif
            <a href="/event/{{$event->id}}">{{$event->title}}</a> ({{$event->date}})</li>
    @endforeach
</ul>
