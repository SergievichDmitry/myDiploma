function init() {
    $.post(
        "admin/core.php",
        {
            "action" : "loadGoods"
        },
        userGoodsOut
    );
}

function userGoodsOut(data) {
    //вывод на страницу
    data = JSON.parse(data);
    var out = '';
    var num = 0;
    var a = "Объявлений: ";
    console.log(num.toString());

    for (var key in data){
        out +='<div class="cart">';
        out +=`<p class="name"><a href="goods.php#${key}" >${data[key].name}</a></p>`;
        out +=`<img class="image" src="${data[key].img}" alt="ссылка побилась">`;
        out +=`<div class="cost">${data[key].cost}</div>`;
        out +=`<button class="delete" data-id="${key}">Удалить</button>`;
        out +='</div>';
        num += 1;
    }
    num.toString();
    $('.num_items').html(a+=num);
    $('.adminGoods-out').html(out);
    $('.delete').on('click', deleteItem);
}

$(document).ready(function() {
    $('#elastic').keydown(function(e) {
        if(e.keyCode === 13) {
            let val = document.querySelector('#elastic').value.trim();
            console.log(val);
            let goods_out = document.querySelectorAll('.cart');
            console.log(goods_out);
            if (val != ''){
                goods_out.forEach(function (elem) {
                    if(elem.innerText.search(RegExp(val,"gi")) == -1){
                        elem.classList.add('hide');
                    }
                    else {
                        elem.classList.remove('hide');
                    }
                });
            }
            else {
                goods_out.forEach(function (elem) {
                    elem.classList.remove('hide');
                });
            }
        }
    });
});

function deleteItem() {
    var id = $(this).attr('data-id');
    console.log(id);
    $.post(
        "admin/core.php",
        {
            "action" : "deleteItem",
            "id" : id
        }
    );
    location.reload(); // перезагружаем страницу
}

$(document).ready(function () {
    init();
});