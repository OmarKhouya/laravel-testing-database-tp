<div>
    <ul>
        <li>title : {{$task->title}}</li>
        <li>description : {{$task->description}}</li>
        <li>status : {{$task->completed ? 'completed' : 'not completed'}}</li>
        <li>created at : {{$task->created_at}}</li>
        <li>Home page : <a href="{{route('tasks.index')}}">home</a></li>
    </ul>
</div>
