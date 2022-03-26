$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// var user = {
//     login: function(){
//         $(".login-btn").click(function () {
//             $(".box-show").fadeIn(500);
//         });
//     }
// }


$(document).ready(function(){
    $("section.register").hide();

    $(".box-show").hide();

    $(".login-btn").click(function () {
        $(".box-show").fadeIn(500);
    });

    $(".close").click(function () {
        $(".box-show").fadeOut(500);
    });


    $(".modal-section.user").click(function () {
        if ($(this).attr("rel") == "logar") {
            $(".modal-section.user.register").removeClass("actived");
            $(".modal-section.user.login").addClass("actived");

            $("section.register").hide(500);
            $("section.login").show(1000);
        }

        if ($(this).attr("rel") == "register") {
            $(".modal-section.user.login").removeClass("actived");
            $(".modal-section.user.register").addClass("actived");

            $("section.login").hide(500);
            $("section.register").show(1000);
        }
    });

    $(".item.active").click(function () {
        $(".lists").toggle("fast");
    });

    $(".loginForm").submit(function (e) {
        e.preventDefault();

        $(".events").html(
            '<div class="alert alert-danger mt-2">Checking...</div>'
        );

        let credentials = {
            nick: $(this).find('input[name="nick"]').val(),
            senha: $(this).find('input[name="senha"]').val(),
            remember_me: $(this)
                .find('input[name="remember_me"]')
                .prop("checked"),
        };

        $.ajax({
            type: "POST",
            url: "/auth/login",
            dataType: "json",
            data: credentials,
            complete: function(response) {
                let data = response.responseJSON;

                if (data.error) {
                    $(".events-login").html(
                        '<div class="alert alert-danger mt-2">' +
                            data.message +
                            "</div>"
                    );
                } else if (data.errors) {
                    $(".events-login").html(
                        '<div class="alert alert-danger mt-2">' +
                            data.message +
                            "</div>"
                    );
                } else {
                    $(".events-login").html(
                        '<div class="alert alert-success mt-2">' +
                            data.message +
                            "</div>"
                    );

                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            }
        });
    });

    $(".registerForm").submit(function () {

        $(".events").html(
            '<div class="alert alert-danger mt-2">Checking...</div>'
        );

        var credentials = $(".registerForm").serialize();
        $.ajax({
            type: "POST",
            url: "/auth/register",
            dataType: "json",
            data: credentials,
            complete: function(response) {
                let data = response.responseJSON;

                if (data.error) {
                    $(".events-register").html(
                        '<div class="alert alert-danger mt-2">' +
                            data.message +
                            "</div>"
                    );
                } else if (data.errors) {
                    $(".events-register").html(
                        '<div class="alert alert-danger mt-2">' +
                            data.message +
                            "</div>"
                    );
                } else {
                    $(".events-register").html(
                        '<div class="alert alert-success mt-2">' +
                            data.message +
                            "</div>"
                    );
                }
            },
        });

        return false;
    });

    $(".commentNews").submit(function () {
        var comment = $(this).serialize()+'&id_news='+id_news;
        $.ajax({
            type: "POST",
            url: "/news/request/comment",
            dataType: "json",
            data: comment,
            success: function (response) {
                if (response.error) {
                    $(".events-comment").html(
                        '<div class="alert alert-danger mt-2">' +
                            response.message +
                            "</div>"
                    );
                } else {
                    $(".comments.list").append(
                        '<article class="comment">' +
                            '<div class="base-avatar" style="background-color: #DBDFE3"></div>' +

                            '<div class="infos col-lg">' +
                                '<div class="base-title d-flex justify-content-between">' +
                                    '<div class="base-title--author d-flex align-items-center">' +
                                        '<div class="base-title--author--name">' + user + '</div>' +
                                        '<div class="base-title--author--data">Comentou agora</div>' +
                                    '</div>' +

                                    '<div class="buttons d-flex">' +
                                        '<div class="btn edit">Editar</div>' +
                                        '<div class="btn report">Reportar</div>' +
                                    '</div>' +
                                '</div>' +

                                '<div class="text">'+ $('.text_comment').val() +'</div>' +
                            '</div>' +
                        '</article>'
                    );

                    $('.text_comment').val('')
                }
            },
        });

        return false;
    });

    $(".btn-player").click(function (){

        if($(".btn-player").attr('rel') == "pause") {
            $(".btn-player").removeClass("fa-pause");
            $(".btn-player").addClass("fa-play")

            $(".btn-player").attr('rel', 'play');
        } else if($(".btn-player").attr('rel') == "play") {
            $('.btn-player').removeClass("fa-play");
            $(".btn-player").addClass("fa-pause")

            $(".btn-player").attr('rel', 'pause');
        }
    })


    $.ajax({
        url: '/streaming',
        success: function(data) {
            data.map((radio) => {
                 $('.lists.radio').append(`
                    <div class="item d-flex align-items-center justify-content-center">
                        <div class="fa-site--icon" style="background: url('assets/imagens/selo.png'); background-repeat: no-repeat; background-position: center;"></div>
                        <div class="fa-site--name" onclick="status('${radio['name']}')">${radio['name'].toUpperCase()}</div>
                    </div>
                `)
            });
        }
    });

});

function status (name) {
    $.ajax({
        type: 'GET',
        url: `http://bobbaxlaravel.test/streaming/${name}`,
        data: { get_param: 'value' },
        dataType: 'json',
        beforeSend: function(data){
            $('.info-status--listeners').html('...');
            $('.info-status--name').html('Carregando...');
            $('.info-status--program--name').html('Carregando...');
            $('.avatar-player').html(`<div class="avatar" style="background: url('https://www.habbo.com.br/habbo-imaging/avatarimage?user=Spolle&action=std&direction=2&head_direction=3&gesture=sml&size=l') -7px -41px;"></div>`)
        },
        success: function (data) {
            $('.info-status--listeners').html(data['ouvintes']);
            $('.info-status--name').html(data['locutor']);
            $('.info-status--program--name').html(data['programa']);
            $('.avatar-player').html(`<div class="avatar" style="background: url('https://www.habbo.com.br/habbo-imaging/avatarimage?user=${data['locutor']}&action=std&direction=2&head_direction=3&gesture=sml&size=l') -7px -41px;"></div>`)
        }
    })
}
