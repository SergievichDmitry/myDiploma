var cart = {};

function init() {
    var hash = window.location.hash.substring(1);
    console.log(hash);
    $.post(
        "admin/core.php",
        {
            "action" : "loadSingleGoods",
            "id" : hash
        },
        goodsOut
    );
}

function goodsOut(data) {
    //вывод на страницу
    data = JSON.parse(data);
    if(data!=0) {
        console.log(data);
        var out = '';
        out += '<div class="cart">';
        out += '<section class="a">';
        out += `<p class="name">${data.name}</p>`;
        out += `<img class="image" src="${data.img}" alt="побилась">`;
        out += '</section><section class="b">';
        out += `<p class="description">${data.description}</p>`;
        out += `<div class="cost">${data.cost}</div>`;
        var a = data.name;
        a = encodeURI(a);
        out += `<button class="add-to-cart" data-id="${data.id}"><a href="answer.php#${data.user}&${a}">Связаться с продавцом</a></button>`;
        out += '</section><section class="c">';
        out += `<p>Контактная информация:</p>`;
        out += `<p class="user">Продавец: ${data.user}</p>`;
        out += `<p class="mail">${data.mail}</p>`;
        out += `<p class="number">${data.number}</p>`;
        out += '</section>';
        out += '</div>';
        $('.goods-out').html(out);
        $('.add-to-cart').on('click', addToCart);
        $('.later').on('click', addToLater);
    }
    else{
        $('.goods-out').html('Такого товара не существует!');
    }
}

function addToLater() {
    //Добавление товара в желания
    var later = {};
    if(localStorage.getItem('later')){
        later = JSON.parse(localStorage.getItem('later'));
    }
    alert('Добавлено в желания');
    var id = $(this).attr('data-id');
    later[id] = 1;
    localStorage.setItem('later', JSON.stringify(later));
}

function addToCart(){
    //добавление товара в корзину
    var id = $(this).attr('data-id');
    //console.log(id);
    if (cart[id] == undefined){
        cart[id] = 1;
    }
    else {
        cart[id]++;
    }
    showMiniCart();
    saveCart();
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function loadCart() {
    if(localStorage.getItem('cart')){
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
    }
}

function showMiniCart() {
    var out="";
    for (var key in cart) {
        out += key +' --- '+ cart[key]+'<br>';
    }
    $('.mini-cart').html(out);
}

$(document).ready(function () {
    init();
    loadCart();
});