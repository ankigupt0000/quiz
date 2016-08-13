function sendchat()
{
        var my_arr=new Array();
        my_arr[0]="msg";
        callServer("/view/chatserver.php",my_arr,"chatbox");
}
