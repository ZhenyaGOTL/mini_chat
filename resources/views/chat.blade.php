@extends('layout')
@section('title')
Чат
@endsection

@section('main')
<main>
<center>
<div id='chat'></div><br><br>
<form method="POST" action="/up_message">
    @csrf
    <input type='text' name="message">
    <br><br>
    <input type='submit'>
</form>
</center>
</main>
<script>
let b = 0
let a = setInterval(function(){
$.ajax({
 url: 'load_message',
 method: 'GET',
}).done(function(response){
    if (b!=response.length){
    for (let i = b; i<response.length;i++){
        $('#chat').append('<h4>'+response[i].name+'</h4>')
        $('#chat').append('<p>'+response[i].message+'</p>')
    }
    b = response.length
    }
});
}, 500)
$('form').on('submit', function(e){
    e.preventDefault();
    var $this = $(this);

    $.ajax({
        url: $this.prop('action'),
        method: 'POST',
        data: $this.serialize(),
    }).done(function(response){
        $('form')[0].reset();
    }).error(function(err){
        console.error('not ok')
    })
})
</script>
@endsection