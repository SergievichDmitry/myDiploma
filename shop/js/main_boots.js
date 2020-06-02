function init() {
    $.post(
        "admin/core.php",
        {
            "action" : "loadBoots"
        },
        bootsOut
    );
}

function bootsOut(data) {
    //вывод на страницу
    data = JSON.parse(data);
    var out = '';
    var num = 0;
    var a = "Объявлений: ";
    console.log(num.toString());

    for (var key in data){
        out +=`<div class="cart" data-sort="${data[key].cost}">`;
        out +=`<p class="name"><a href="goods.php#${key}" >${data[key].name}</a></p>`;
        out +=`<img class="image" src="${data[key].img}" alt="ссылка побилась">`;
        out +=`<div class="cost">${data[key].cost}</div>`;
        //out +=`<button class="add-to-cart" data-id="${key}">Купить</button>`;
        out +='</div>';
        num += 1;
    }
    num.toString();
    $('.num_items').html(a+=num);
    $('.boots-out').html(out);
    $('#sort_from_down').on('click', sortFromDown);
    $('#sort_from_up').on('click', sortFromUp);
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

function sortFromDown() {
    let goods_out = document.querySelector('.boots-out');
    console.log(goods_out.length);
    for (let i = 0; i < goods_out.children.length; i++){
        for(let j = i; j < goods_out.children.length; j++){
            if(+goods_out.children[i].getAttribute('data-sort') > +goods_out.children[j].getAttribute('data-sort')){
                replacedNode = goods_out.replaceChild(goods_out.children[j], goods_out.children[i]);
                insertAfter(replacedNode, goods_out.children[i]);
            }
        }
    }
}

function sortFromUp() {
    let goods_out = document.querySelector('.boots-out');
    console.log(goods_out.length);
    for (let i = 0; i < goods_out.children.length; i++){
        for(let j = i; j < goods_out.children.length; j++){
            if(+goods_out.children[i].getAttribute('data-sort') < +goods_out.children[j].getAttribute('data-sort')){
                replacedNode = goods_out.replaceChild(goods_out.children[j], goods_out.children[i]);
                insertAfter(replacedNode, goods_out.children[i]);
            }
        }
    }
}

function insertAfter(elem, refElem) {
    return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
}

$(document).ready(function () {
    init();
});