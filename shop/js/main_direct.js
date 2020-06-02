function init() {
    //$.getJSON("news.json", newsOut);
    $.post(
        "admin/core.php",
        {
            "action" : "loadDirect"
        },
        directOut
    );
}

function directOut(data) {
    //вывод на страницу
    data = JSON.parse(data);
    console.log(data);
    var out = '';
    var num = 0;
    var b = "Сообщений: ";
    console.log(num.toString());

    for (var key in data){
        out +='<div class="dialog">';
        out +=`<p class="text">Сообщение от: <a href="dialog.php#${key}" >${data[key].sender}</a></p>`;
        out +=`<p class="text">По поводу товара: </p>`;
        out +=`<h3 class="text">${data[key].name}</h3>`;
        out +=`<p class="text">${data[key].message}</p>`;
        out +=`<p class="text">Время отправки: ${data[key].time}</p>`;
        var a = data[key].name;
        a = encodeURI(a);
        out +=`<button class="answer" data-id="${key}"><a href="answer.php#${data[key].sender}&${a}">Ответить</a></button>`;
        out +=`<button class="delete" data-id="${key}">Удалить</button>`;
        out +='</div>';
        num += 1;
    }
    num.toString();
    $('.num_items').html(b+=num);
    $('.direct-out').html(out);
    $('.delete').on('click', deleteMessage);
}

function deleteMessage() {
    var id = $(this).attr('data-id');
    console.log(id);
    $.post(
        "admin/core.php",
        {
            "action" : "deleteMessage",
            "id" : id
        }
    );
    location.reload(); // перезагружаем страницу
}


$(document).ready(function () {
    init();
});