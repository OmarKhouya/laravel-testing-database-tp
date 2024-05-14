<form action="{{route('tasks.store')}}" method="post">
    @csrf
    <div>
        <label for="title">title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="description">description</label>
        <input type="text" name="description" id="description">
    </div>
    <div>
        <label for="completed">completed</label>
        <div>
            <label for="yes">yes</label>
            <input type="radio" id="yes" name="completed" value="1">
        </div>
        <div>
            <label for="no">no</label>
            <input type="radio" id="no" name="completed" value="0">
        </div>
    </div>
    <button type="submit">update</button>
</form>
