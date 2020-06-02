var cart = {};

function init() {
    var hash = window.location.hash.substring(1);
    console.log(hash);
    $.post(
        "admin/core.php",
        {
            "action" : "loadSingleNews",
            "id" : hash
        },
        newsOut
    );
}

function newsOut(data) {
    //вывод на страницу
    data = JSON.parse(data);
    if(data!=0) {
        console.log(data);
        var out = '';
        out +='<div class="news">';
        out +=`<p class="name">${data.name_news}</a></p>`;
        out +=`<img class="image" src="${data.img_news}" alt="ссылка побилась">`;
        out +=`<p class="text">${data.text_news}</p>`;
        out +='</div>';
        $('.news-out').html(out);
    }
    else{
        $('.news-out').html('Такого товара не существует!');
    }
}

$(document).ready(function () {
    init();
});