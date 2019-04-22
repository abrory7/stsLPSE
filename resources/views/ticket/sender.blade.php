<form action="{{route('sendMsg')}}" method="post">
{{ csrf_field() }}
    <input type="text" name="message">
    <input type="submit" >
</form>