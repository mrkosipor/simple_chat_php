<?php session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
    echo "<div id='name'>
            <p>Hello, " . $_SESSION['username']. " !</p>  
            <form method='POST' action='exit.php'>
            <input type='submit' name='exit' value='Log_Out'>
            </form>
          </div>";
}
?>

<!--Jquery!-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript">
    function send() {
        /*playing around checkbox*/
        var a = 0;
        if ($('input[type="checkbox"]:checked').val() == 'on') {
            a = 1;
        } else a = 0;
        /*console.log(a);*/

        let mess = $("#mess_to_send").val();
        $.ajax({
            type: "POST",
            url: "add_mess.php",
            data: {mess: mess, a: a},
            success: function (html) {
                load_mess();
                $("#mess_to_send").val('');
            }
        });
    }

    function load_mess() {
        $.ajax({
            type: "POST",
            url: "load_mess.php",
            data: "req=ok",
            success: function (html) {
                $("#messages").empty();
                $("#messages").append(html);
                $("#messages").scrollBottom(90000);
            }
        });
    }
</script>

<table>
    <tr>
        <td>
            <div id="messages">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <form action="" onsubmit="send()">
                <!--<input type="text" id="mess_to_send" name="mess">-->
                <textarea id="mess_to_send" name="mess" placeholder="Your message" rows="5" cols="45"></textarea>
                <input type="button" value="Send" onclick="send()">
                <label for="checkbox1" class="text" style="color: #00d7c3">vision</label>
                <input type="checkbox" name='checkbox1' id="checkbox1">
            </form>
        </td>
    </tr>
</table>

<script>
    load_mess();
    setInterval(load_mess, 3000);
</script>