<form action="{{route('tasks.update', $task)}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{$task->title}}">
    </div>
    <div>
        <label for="description">description</label>
        <input type="text" name="description" id="description" value="{{$task->description}}">
    </div>
    <div>
        <label for="completed">completed</label>
        <div>
            <label for="yes">yes</label>
            <input type="radio" id="yes" name="completed" {{$task->completed ? 'checked' : ''}}  value="1">
        </div>
        <div>
            <label for="no">no</label>
            <input type="radio" id="no" name="completed" {{$task->completed ? '' : 'checked'}}  value="0">
        </div>
    </div>
    <button type="submit">update</button>
</form>
