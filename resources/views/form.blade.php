<form method="post" action=" {{route('postForm')}} ">
    {{ csrf_field() }}
    <input type="text" name="hoten" >
    <input type="submit" value ="Submit" >

</form>