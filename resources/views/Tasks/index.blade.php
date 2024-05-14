<a href="{{route('tasks.create')}}">create</a>
<table border="1">
    <tr>
        <th>title</th>
        <th>description</th>
        <th>status</th>
        <th>action</th>
    </tr>
    @forelse($tasks as $task)
        <tr>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->completed ? 'completed' : 'not completed'}}</td>
            <td>
                <a href="{{route('tasks.edit', $task)}}">edit</a>
                <form action="{{route('tasks.destroy', $task)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">delete</button>
                </form>
                <a href="{{route('tasks.show', $task)}}">show</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" style="text-align: center">no tasks</td>
        </tr>
    @endforelse
</table>
