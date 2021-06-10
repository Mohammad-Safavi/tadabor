<html>
<body>
<form action="{{Route('email.store')}}" method="post">
    @csrf
    <label>name</label>
    <input name="name" type="text" /><br>
    <label>title</label>
    <input name="title" type="text" /><br>
    <label>message</label>
    <input name="message" type="text" /><br>
   <input type="submit" value="send">



</form>
</body>
</html>
