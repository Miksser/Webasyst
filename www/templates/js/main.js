$(document).ready(function () {
    $("#myForm").validate({
        rules: {
            characteristics: {
                notnumber: true,
                required: true,
                checkfloat: true,
                naturalnumbers: true,
                valuelength: true
            }
        },
        messages: {
            characteristics: {
                required: 'Заполните форму'
            }
        },
        submitHandler: function (form) {
            sendInfo();
        }
    });

    /**
     * Скрытие отчета.Обнуление input
     */
    $("#nextElephants").click(function () {
        $("#characteristics").val('')
        $(".report").hide();
        $(".listElephants").hide();
    });

    /**
     * Формированние отчета. Разделен на 2 запроса для упрощения.
     * 1 запрос получает бракованных слонов
     * 2 запрос получает информацию о количестве
     */
    $("#getElephants").click(function () {
        $('.headerDefect').show();
        $('.report').show();
        $(".listElephants").show();
        $('.rolldown-list').empty();
        $.ajax(
            {
                type: "POST",
                url: '/method/getlastelephants/',
                async: false,
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        data.forEach(function (item, i, data) {
                            $('.rolldown-list').append('<li class="defectElephants">' +
                                item['weight'] + ', ' + item['length'] + '</li>')
                        });

                    }
                },
                error: function () {
                    alert('Ошибка при получении бракованных слонов')
                }
            });
        $.ajax(
            {
                type: "POST",
                url: '/method/getcountelephants/',
                async: false,
                dataType: 'json',
                success: function (data) {
                    $('.reportDefect').html(data['Defective']);
                    $('.reportSale').html(data['Realization']);
                },
                error: function () {
                    alert('Ошибка при получении отчета')
                }
            });
    })

});

/**
 * Отправка слонов в базу данных
 */
function sendInfo() {
    var info = $("#myForm").serialize();
    $.ajax(
        {
            type: "POST",
            url: '/method/addinfo/',
            data: info,
            async: false,
            success: function (data) {
                alert(data);
            },
            error: function () {
                alert('Ошибка при добавлении')
            }
        });
}

/**
 * Добавление проверок формы в jquery.validate
 */

//Проверка на десятичные числа
$.validator.addMethod("checkfloat", function (value) {
        var result = value.match(/[0-9]*[.][0-9]/g);
        if (result == null) {
            return true;
        }
    },
    "Разрешены только целые числа");

//Проверка на количество чисел
$.validator.addMethod("valuelength", function (value) {

        var result = value.match(/[0-9]+/g);
        var arrLength = result.length;
        if (arrLength > 1 && arrLength < 3) {
            return arrLength;
        }
    },
    "Требуется ввести 2 числа");

//Проверка на положительные числа
$.validator.addMethod("naturalnumbers", function (value) {
        var result = value.match(/-[0-9]+/g);
        if (result == null) {
            return true;
        }
    },
    "Разрешены только положительные числа");

//Проверка на присутствие букв
$.validator.addMethod("notnumber", function (value) {
        var result = value.match(/[^\s\.\d\,\-]/g);
        if (result == null) {
            return true;
        }
    },
    "Разрешены только цифры и запятая");