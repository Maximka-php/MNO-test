$('#registration_form').submit(function(){
    $.post(
        '../User/registration.php', // адрес обработчика
        $("#registration_form").serialize(), // отправляемые данные

        function(msg) { // получен ответ сервера
            $('#registration_form').hide('slow');
            $('#result_form').html(msg);
        }
    );
    return false;
});

$('#avtoriz_form').submit(function(){
    $.post(
        '../User/avtorization.php', // адрес обработчика
        $("#avtoriz_form").serialize(), // отправляемые данные

        function(msg) { // получен ответ сервера
            $('#avtoriz_form').hide('slow');
            $('#avt_reg').hide('slow');
            $('#result_form').html(msg);
        }
    );
    return false;
});