function init() {
    //$.getJSON("news.json", newsOut);
    $.post(
        "admin/core.php",
        {
            "action" : "loadNews"
        },
        newsOut
    );
}

function newsOut(data) {
    //вывод на страницу
    data = JSON.parse(data);
    console.log(data);
    var out = '';
    var num = 0;
    var a = "Новостей: ";
    console.log(num.toString());

    for (var key in data){
        out +='<div class="news">';
        out +=`<img class="image" src="${data[key].img_news}" alt="ссылка побилась">`;
        out +=`<p class="name"><a href="news.php#${key}" >${data[key].name_news}</a></p>`;
        out +=`<button class="delete" data-id="${key}">Удалить</button>`;
        out +='</div>';
        num += 1;
    }
    num.toString();
    $('.num_items').html(a+=num);
    $('.news-out').html(out);
    $('.delete').on('click', deleteNews);
}

function deleteNews() {
    var id = $(this).attr('data-id');
    console.log(id);
    $.post(
        "admin/core.php",
        {
            "action" : "deleteNews",
            "id" : id
        }
    );
    location.reload(); // перезагружаем страницу
}

$(document).ready(function () {
    init();
});