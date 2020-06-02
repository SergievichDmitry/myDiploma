function saveAnswer(){

        $.post(
            "admin/core.php",
            {
                "action" : "newAnswer",
                "id" : 0,
                "glogin" : $('#glogin').val(),
                "gname" : $('#gname').val(),
                "gtext" : $('#gtext').val()
            },
            function(data) {
                if (data ==1){
                    alert('Сообщение отправлено');
                    init();
                }
                else{
                    console.log(data);
                }
            }
        );
}

$(document).ready(function () {
    var hash = window.location.hash.substring(1);
    console.log(hash);
    var params = {}

    params = hash.split('&');
    console.log(params);
    var name = params[1];
    name = decodeURI(name);
    console.log(name);

    var out = '';
    out += '<form class="message">';
    out += '<h2> Отправить сообщение:</h2>';
    out += `<p>Кому: <input type="text" id="glogin" value="${params[0]}"></p>`;
    out += `<p>Товар: <input type="text" id="gname" value="${name}"></p>`;
    out += `<p>Текст сообщения: <textarea id="gtext"></textarea></p>`;
    out += `<input type="hidden" id="gid">`;
    out += `<button class="add-answer">Отправить</button>`;
    out += '</form>';
    $('.message_form').html(out);

    $('.add-answer').on('click', saveAnswer);
})