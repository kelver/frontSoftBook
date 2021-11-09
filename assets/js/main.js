let URLAPI = 'http://localhost:8081/api/';

function showSpinn() {
    $('#spinner').addClass("show");
}
function hideSpinn() {
    $('#spinner').removeClass("show");
}

$(document).on('submit', '#formLogin', function (e){
    e.preventDefault();
    showSpinn();
    const payload = {
        'email': $('#username').val(),
        'password': $('#password').val()
    };
    fetch(URLAPI + 'auth/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: (JSON.stringify(payload))
    })
        .then(response => response.json())
        .then(res => {
            const user = res.me;
            localStorage.setItem('__my_app_token', res.access_token);
            localStorage.setItem('__my_app_user', user);
            validaLogin();
            hideSpinn();
        });
});

$(document).on('submit', '#searchForm', function (e){
    e.preventDefault();
    showSpinn();
    const payload = {
        'search': $('#search').val()
    };
    fetch(URLAPI + 'books/find', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        },
        body: (JSON.stringify(payload))
    })
        .then(response => response.json())
        .then(res => {
            montaHtml(res);
            hideSpinn();
        });
});

$(document).on('click', '#showDetail', function (){
    showSpinn();
    fetch(URLAPI + 'books/' + $(this).attr('data-identify'), {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        }
    })
        .then(response => response.json())
        .then(res => {
            $(document).find('#modalDetalhe #titleBook').text(res.data.title);
            $(document).find('#modalDetalhe #descriptionBook').text(res.data.description);
            $(document).find('#modalDetalhe #pagesBook').text(res.data.pages + ' páginas.');
            $(document).find('#modalDetalhe #authorBook').text(res.data.author);
            $(document).find('#modalDetalhe').modal('show');
            hideSpinn();
        });
});

function validaLogin(){
    const token = localStorage.getItem('__my_app_token');
    let rotaLogin = window.location.pathname.indexOf('myBooks') <= -1;

    if(!token && !rotaLogin){
        window.location.href = "index.php";
        return false;
    }
    if(token && rotaLogin){
        window.location.href = "myBooks.php";
        return false;
    }
    return false;
}

$(document).on('click', '.page-link', function (e){
    findBooks($(this).attr('data-href'));
});

function findBooks(url = URLAPI + 'books/'){
    showSpinn();
    return fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        }
    })
        .then(response => response.json())
        .then(res => {
            montaHtml(res);
            hideSpinn();
        });
}

$(document).on('click', '#showEditModal', function (){
    showSpinn();
    return fetch(URLAPI + 'books/' + $(this).attr('data-identify'), {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        }
    })
        .then(response => response.json())
        .then(res => {
            $(document).find('#modalEditar #titleBook').text('[Edit] | ' + res.data.title);
            $(document).find('#modalEditar #title').val(res.data.title);
            $(document).find('#modalEditar #description').val(res.data.description);
            $(document).find('#modalEditar #pages').val(res.data.pages);
            $(document).find('#modalEditar #author').val(res.data.author);
            $(document).find('#modalEditar #identify').val(res.data.identify);
            $(document).find('#modalEditar').modal('show');
            hideSpinn();
        });
});

$(document).on('click', '#modalDelete #confirmDelete', function (){
    showSpinn();
    return fetch(URLAPI + 'books/' + $(document).find('#modalDelete #identify').val(), {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        }
    })
        // .then(response => response.json())
        .then(res => {
            $(document).find('#modalDelete #titleBook').text('');
            $(document).find('#modalDelete').modal('hide');
            findBooks();
        });
});

$(document).on('click', '#showDeleteModal', function (){
    $(document).find('#modalDelete #titleBook').text('[Delete] | ' + $(this).attr('data-title'));
    $(document).find('#modalDelete #identify').val($(this).attr('data-identify'));
    $(document).find('#modalDelete').modal('show');
});

$(document).on('click', '#sendEdit', function (e){
    showSpinn();
    let payload = {
        'title': $(document).find('#modalEditar #title').val(),
        'description': $(document).find('#modalEditar #description').val(),
        'pages': $(document).find('#modalEditar #pages').val(),
        'author': $(document).find('#modalEditar #author').val()
    };

    return fetch(URLAPI + 'books/' + $(document).find('#modalEditar #identify').val(), {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        },
        body: JSON.stringify(payload)
    })
        .then(response => response.json())
        .then(res => {
            $(document).find('#modalEditar #titleBook').text('');
            $(document).find('#modalEditar #title').val('');
            $(document).find('#modalEditar #description').val('');
            $(document).find('#modalEditar #pages').val('');
            $(document).find('#modalEditar #author').val('');
            $(document).find('#modalEditar').modal('hide');
            findBooks();
        });
});

$(document).on('click', '#sendInsert', function (e){
    showSpinn();
    let payload = {
        'title': $(document).find('#modalInserir #title').val(),
        'description': $(document).find('#modalInserir #description').val(),
        'pages': $(document).find('#modalInserir #pages').val(),
        'author': $(document).find('#modalInserir #author').val()
    };

    return fetch(URLAPI + 'books/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + localStorage.getItem('__my_app_token'),
        },
        body: JSON.stringify(payload)
    })
        .then(response => response.json())
        .then(res => {
            $(document).find('#modalInserir #titleBook').text('');
            $(document).find('#modalInserir #title').val('');
            $(document).find('#modalInserir #description').val('');
            $(document).find('#modalInserir #pages').val('');
            $(document).find('#modalInserir #author').val('');
            $(document).find('#modalInserir').modal('hide');
            findBooks();
        });
});

function montaHtml(res)
{
    $('#listBooks').empty();
    let html = '';
    $.each(res.data, function(i, item) {
        html +='' +
            '<div class="col-lg-4 col-md-4 col-sm-6 d-flex align-items-stretch">\n' +
            '   <div class="card mb-3">\n' +
            '       <div class="row g-0">\n' +
            '           <div class="col-md-4">\n' +
            '               <img style="max-height: 200px;object-fit: cover;" src="https://images.unsplash.com/photo-1612385764381-87816a4b2208?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=436&q=80" class="img-fluid rounded-start" alt="Imagem de um livro">\n' +
            '           </div>\n' +
            '           <div class="col-md-8">\n' +
            '               <div class="card-body">\n' +
            '                   <h5 class="card-title">'+ item.title +'</h5>\n' +
            '                   <p class="card-text">'+ item.description +'</p>\n' +
            '                   <p class="card-text">' +
            '                       <small class="text-muted">'+ item.pages +' páginas.</small>' +
            '                   </p>\n' +
            '               </div>\n' +
            '           </div>' +
            '           <div class="card-footer">\n' +
            '               <button type="button" id="showDetail" data-identify="'+ item.identify +'" class="btn btn-outline-primary btnRounded mx-2">\n' +
            '                   <i class="fa-solid fa-eye"></i>\n' +
            '               </button>\n' +
            '               <button type="button" id="showEditModal" data-identify="'+ item.identify +'" class="btn btn-outline-warning btnRounded mx-2">\n' +
            '                   <i class="fa-solid fa-marker"></i>\n' +
            '               </button>\n' +
            '               <button type="button" id="showDeleteModal" data-identify="'+ item.identify +'" data-title="'+ item.title +'" class="btn btn-outline-danger btnRounded mx-2">\n' +
            '                   <i class="fa-solid fa-trash-can"></i>\n' +
            '               </button>\n' +
            '           </div>\n' +
            '       </div>\n' +
            '   </div>\n' +
            '</div>';
    });

    let arrPaginate = {
        'first': (res.links.first == null) ? 'disabled' : 'data-href='+ res.links.first,
        'prev': (res.links.prev == null) ? 'disabled' : 'data-href='+ res.links.prev,
        'next': (res.links.next == null) ? 'disabled' : 'data-href='+ res.links.next,
        'last': (res.links.last == null) ? 'disabled' : 'data-href='+ res.links.last,
    };

    let paginacao = '' +
        '<div class="d-flex justify-content-center">\n' +
        '   <nav aria-label="bloco de páginas">\n' +
        '     <ul class="pagination">\n' +
        '       <li class="page-item"><button class="page-link" '+ arrPaginate.first +'>primeira</button></li>\n' +
        '       <li class="page-item"><button class="page-link" '+ arrPaginate.prev +'><</button></li>\n' +
        '       <li class="page-item"><button class="page-link" '+ arrPaginate.next +'>></button></li>\n' +
        '       <li class="page-item"><button class="page-link" '+ arrPaginate.last +'>última</button></li>\n' +
        '     </ul>\n' +
        '   </nav>' +
        '</div>';

    html += paginacao;
    $('#listBooks').append(html);
}

function insertDropProfile()
{
    const name = JSON.parse(localStorage.getItem('__my_app_user')).name;
    $('#dropProfile').text(name);
}

function getLocation()
{
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

function showPosition(position)
{
    if(!localStorage.getItem('__temp_my_app')){
        $.getJSON('https://api.ipify.org?format=json')
            .done(function (data) {
                $.getJSON('https://api.hgbrasil.com/geoip?format=json-cors&key=aeadc17e&address=' + data.ip + '&precision=false&fields=only_results,woeid')
                    .done(function (data) {
                        $.getJSON('https://api.hgbrasil.com/weather?format=json-cors&fields=only_results,temp&woeid=' + data.woeid)
                            .done(function (data) {
                                $('#temp').text(data.results.temp + 'º C');
                                localStorage.setItem('__temp_my_app', data.results.temp);
                                return false;
                            });
                    });
            });
    }
    $('#temp').append(localStorage.getItem('__temp_my_app') + 'º C');
}

validaLogin();
insertDropProfile();
getLocation();