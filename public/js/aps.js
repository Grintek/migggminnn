var postId = 0;
var postBodyElement = null;
$('.post').find('.interaction').find('.edit').on('click', function(event) {
   event.preventDefault();

   postBodyElement = event.target.parentNode.parentNode.childNodes[1];
   var postBody = postBodyElement.textContent;
   postId = event.target.parentNode.parentNode.dataset['postid'];
   $('#post-body').val(postBody);
   $('#edit-modal').modal();
});

$('#modal-save').on('click', function(){
   $.ajax({
       method: 'POST',
       url: urlEdit,
       data: { body: $('#post-body').val(), postId: postId, _token: token}
   })
       .done(function (msg) {
           $(postBodyElement).text(msg['new_body']);
           $('#edit-modal').modal('hide');
       });
});

$('.like').on('click', function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}

    })
        .done(function () {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Тебе нравится этот POST' :  'Like' : event.target.innerText == 'Dislike' ? "Тебе не нравится этот POST" : 'Dislike';
            if(isLike){
                event.target.nextElementSibling.innerText = 'Dislike';
            }else{
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});

/**
 * меняем при нажатие стиль окна канала и переключатель на работает или не работает
 */
const url = document.location.href;
let idUrl = url.slice(-1);
/**
 * ставим бегунок по записи в бд
 */
$.ajax({
    type: "GET",
    url: '/channelonof',
    success: function(data) {

        if (data === '1') {
            $('#btnChannel').css({"background": 'radial-gradient(red 20%, #0000004a 114%)'});
            $('#btnChannelSwitch').css({"margin-left": '52px'});

        }
    }
});
/**
 * выключить, включить трансляцию
 */
$('#btnChannel').on('click', function(){
       $.ajax({
           type: "GET",
           url: '/channelswitch',
           success: function(data) {
               if (data === '1') {
                   $('#btnChannel').css({"background": 'radial-gradient(red 20%, #0000004a 114%)'}, 1000);
                   $('#btnChannelSwitch').animate({marginLeft: '52px'}, 1000);

               }else if(data === '0'){
                   $('#btnChannel').css({"background": 'radial-gradient(#6c6ce1 20%, #0000004a 114%)'}, 1000);
                   $('#btnChannelSwitch').animate({marginLeft: '0px'}, 1000);
               }
           }
       });

});
//при наведении на картинку в dashboard

//управление главным плеером
$.ajax({
    type: "GET",
    url: '/playerheader',
        success: function (data) {
            $('#iframe_player').attr('src', data);
        }
});

/**
 * банер ошибки
 */

//при нажатие на крестик банер ищезает
$('.baner_exit').on('click', function () {
   $('.error').css({"display":"none"})
});

//при наведение мыши на кнопку с иксом
$('.baner_exit').mouseenter('click', function () {
    $('.baner_exit').css({"border":"3px solid black"})
});
// и наоборот
$('.baner_exit').mouseleave('click', function () {
    $('.baner_exit').css({"border":"none"})
});
