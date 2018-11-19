<h1>Задача 2 - Форма обратной связи</h1>

    <p>Заполните свои контактные данные, для связи</p>

    <form action="task2" method="post">
        <label>Введите имя</label>
        <br>
        <input id="user_name" type="name">
        <br>
        <label>Введите email</label>
        <br>
        <input id="email" type="email" required>
        <span id="valid"></span>
        <br>
        <label>Сообщение</label>
        <br>
        <textarea id="text" rows="5" type="text"></textarea>
        <br>

        <button type="submit" id="button">Отправить</button>
    </form>
<script>
    $(document).ready(function() {
        function checkValid(){
            if($(this).val() != '') {
                var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
                if(pattern.test($(this).val())){
                    $(this).css({'border' : '1px solid #569b44'});
                    $('#valid').text('Верно');
                } else {
                    $(this).css({'border' : '1px solid #ff0000'});
                    $('#valid').text('Не верно');
                    return false;
                }
            } else {
                $(this).css({'border' : '1px solid #ff0000'});
                $('#valid').text('Поле email не должно быть пустым');
            }
        }

        $('#email').blur(function() {
            checkValid();
        });

        $('#button').on('submit',function() {
            checkValid();
        });

    });
</script>