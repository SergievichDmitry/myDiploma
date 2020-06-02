function init_blog(){
    $.post(
        "core.php",
        {
            "action" : "init_blog"
        },
        showNews
    );
}

function showNews(data){
    data = JSON.parse(data);
    console.log(data);
    var out = '<select>';
    out +='<option data-id = "0">Новая новость</option>';
    for (var id in data){
        out += `<option data-id ="${id}">${data[id].name_news}</option>`;
    }
    out+='</select>';
    $('.news-out').html(out);
    $('.news-out select').on('change', selectNews);
}

function selectNews(){
    var id = $('.news-out select option:selected').attr('data-id');
    console.log(id);
    $.post(
        "core.php",{
            "action" : "selectOneNews",
            "gid_news" : id
        },
        function (data) {
            data = JSON.parse(data);
            $('#name_news').val(data.name_news);
            $('#text_news').val(data.text_news);
            $('#img_news').val(data.img_news);
            $('#gid_news').val(data.id);
        }
    );
}

function saveToDb(){
    var id = $('#gid_news').val();
    if(id!=""){
        $.post(
            "core.php",
            {
                "action" : "updateNews",
                "id" : id,
                "name_news" : $('#name_news').val(),
                "text_news" : $('#text_news').val(),
                "img_news" : $('#img_news').val()
            },
            function(data) {
                if (data ==1){
                    alert('Запись добавлена');
                    init_blog();
                }
                else{
                    console.log(data);
                }
            }
        );
    }
    else {
        $.post(
            "core.php",
            {
                "action" : "newNews",
                "id" : 0,
                "name_news" : $('#name_news').val(),
                "text_news" : $('#text_news').val(),
                "img_news" : $('#img_news').val()
            },
            function(data) {
                if (data ==1){
                    alert('Запись добавлена');
                    init_blog();
                }
                else{
                    console.log(data);
                }
            }
        );
    }
}

$(document).ready(function () {
    init_blog();
    $('.add-to-db_news').on('click', saveToDb);
})