<html>
    <head>
        <title>Laravel</title>
    </head>
    <body id="demo">
        <ul>
            <li v-for="user in users">@{{ user }}</li>
        </ul>
        <script src="https://cdn.bootcss.com/vue/1.0.4/vue.min.js"></script>
        <script src="https://cdn.bootcss.com/socket.io/1.7.3/socket.io.min.js"></script>
        <script>
            var socket = io('localhost:3000');
            new Vue({
                el:'#demo',
                data:{
                    users:[]
                },
                ready:function(){
                    socket.on('test-channel:App\\Events\\ANewMessage',function (data) {
                        this.users.push(data.name);
                        console.log(data.name);
                    }.bind(this))
                }
            })
        </script>
    </body>
</html>
