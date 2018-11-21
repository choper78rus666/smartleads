<h1>Задача 2 - Форма обратной связи</h1>

    <p>Заполните свои контактные данные, для связи</p>

    <form action="#" id="sender" method="post">
        <label>Введите имя</label>
        <br>
        <input id="user_name" type="name" name="user" required>
        <br>
        <label>Введите email</label>
        <br>
        <input id="email" type="email" name="email" required>
        <span id="valid"></span>
        <br>
        <label>Сообщение</label>
        <br>
        <textarea id="text" rows="5" type="text" name="text" required></textarea>
        <br>
        <input type="button" id="button" value="Отправить" disabled>
    </form>
<h3>
<script>
    $(document).ready(function() {
        function checkValid(){
            if($('#email').val() != '') {
                var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
                if(pattern.test($('#email').val())){
                    $('#email').css({'border' : '1px solid #569b44'});
                    $('#valid').text('Верно');
                    $('#button').removeAttr('disabled');
                } else {
                    $('#email').css({'border' : '1px solid #ff0000'});
                    $('#valid').text('Не верно');
                    $('#button').attr('disabled','');
                }
            } else {
                $('#email').css({'border' : '1px solid #ff0000'});
                $('#valid').text('Поле email не должно быть пустым');
            }
        }

        $('#email').on('keyup',function() {
            checkValid();
        });

        $('#button').on('click', function () {

            var send_data = {
                user: $('#user_name').val(),
                email: $('#email').val(),
                text: $('#text').val()
            };

            send_data = 'send_data=' + JSON.stringify(send_data);

            $.ajax({
                type: "POST",
                url: "/task2/send",
                data: send_data,
                async: true,
                    success : function(result){
                    if(result == "1"){
                        document.location.replace("/task2/ok");
                    } else {
                        document.location.replace("/task2/err");
                    }
                }
            });
        });

    });
</script>