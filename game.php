<!DOCTYPE html>
<html>
<head>
    <title>Pixel Game</title>
    <style>
        @font-face {
            font-family: 'PixelFont';
            src: url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            font-family: 'PixelFont', monospace;
            color: #fff;
            image-rendering: pixelated;
        }

        .game-container {
            width: 800px;
            height: 600px;
            margin: 20px auto;
            border: 4px solid #fff;
            position: relative;
            background: #111;
        }

        .game-area {
            width: 600px;
            height: 600px;
            float: left;
            background: repeating-linear-gradient(
                45deg,
                #111,
                #111 10px,
                #1a1a1a 10px,
                #1a1a1a 20px
            );
        }

        .chat-area {
            width: 200px;
            height: 600px;
            float: right;
            background: #222;
            border-left: 4px solid #fff;
        }

        .chat-messages {
            height: 500px;
            overflow-y: auto;
            padding: 10px;
            font-size: 12px;
        }

        .chat-input {
            height: 100px;
            border-top: 4px solid #fff;
            padding: 10px;
        }

        input[type="text"] {
            width: 180px;
            padding: 8px;
            background: #111;
            border: 2px solid #fff;
            color: #fff;
            font-family: 'PixelFont', monospace;
            margin-bottom: 10px;
        }

        .btn {
            background: #fff;
            border: none;
            padding: 8px 16px;
            color: #000;
            font-family: 'PixelFont', monospace;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn:hover {
            background: #0f0;
        }

        .player {
            width: 32px;
            height: 32px;
            background: #0f0;
            position: absolute;
            transition: all 0.1s;
        }

        .player-name {
            position: absolute;
            top: -20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }

        .stats {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px;
            background: rgba(0,0,0,0.7);
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <div class="game-area">
            <div class="stats">
                HP: 100/100<br>
                XP: 0<br>
                Level: 1
            </div>
            <div class="player" id="player1" style="left: 100px; top: 100px;">
                <div class="player-name">Player1</div>
            </div>
        </div>
        <div class="chat-area">
            <div class="chat-messages" id="chat">
                <div>Welcome to the game!</div>
                <div>Player1 joined the game</div>
                <div>Player2: hello everyone</div>
            </div>
            <div class="chat-input">
                <input type="text" id="message" placeholder="Type message...">
                <button class="btn" onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>

    <script>
        let player = document.getElementById('player1');
        let posX = 100;
        let posY = 100;
        
        document.addEventListener('keydown', (e) => {
            const speed = 5;
            
            switch(e.key) {
                case 'ArrowUp':
                    posY = Math.max(0, posY - speed);
                    break;
                case 'ArrowDown':
                    posY = Math.min(568, posY + speed);
                    break;
                case 'ArrowLeft':
                    posX = Math.max(0, posX - speed);
                    break;
                case 'ArrowRight':
                    posX = Math.min(568, posX + speed);
                    break;
            }
            
            player.style.left = posX + 'px';
            player.style.top = posY + 'px';
        });

        function sendMessage() {
            let messageInput = document.getElementById('message');
            let chat = document.getElementById('chat');
            
            if(messageInput.value.trim() !== '') {
                let messageDiv = document.createElement('div');
                messageDiv.textContent = 'Player1: ' + messageInput.value;
                chat.appendChild(messageDiv);
                messageInput.value = '';
                chat.scrollTop = chat.scrollHeight;
            }
        }

        
        document.getElementById('message').addEventListener('keypress', (e) => {
            if(e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>
</html>
