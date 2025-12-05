<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hidden Snake</title>
    <style>
        body {
            background: #6f6f6f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #0f0;
            font-family: monospace;
        }
    </style>
</head>

<body>

<div id="score" style="position:absolute; top:170px; left:500px; color:#0f0; font-size:22px;">
    Score : 0 / 10
    <p>
        Mangez 10 pommes pour sortir de cette serpenterie !
    </p>
</div>

<canvas id="game" width="400" height="400"></canvas>

<script>
    let count = 0;

    const canvas = document.getElementById("game");
    const ctx = canvas.getContext("2d");

    const gridSize = 20;
    let snake = [{ x: 10, y: 10 }];
    let direction = { x: 1, y: 0 };
    let food = { x: 5, y: 5 };
    let gameOver = false;

    // --- INPUT CLAVIER ---
    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowUp" && direction.y !== 1) direction = { x: 0, y: -1 };
        if (e.key === "ArrowDown" && direction.y !== -1) direction = { x: 0, y: 1 };
        if (e.key === "ArrowLeft" && direction.x !== 1) direction = { x: -1, y: 0 };
        if (e.key === "ArrowRight" && direction.x !== -1) direction = { x: 1, y: 0 };
    });

    // --- GÉNÈRE NOURRITURE ---
    function generateFood() {
        food.x = Math.floor(Math.random() * (canvas.width / gridSize));
        food.y = Math.floor(Math.random() * (canvas.height / gridSize));
    }

    // --- LOGIQUE DU JEU ---
    function update() {
        if (gameOver) return;

        // Nouvelle tête
        const head = {
            x: snake[0].x + direction.x,
            y: snake[0].y + direction.y
        };

        // Collision mur
        if (
            head.x < 0 ||
            head.x >= canvas.width / gridSize ||
            head.y < 0 ||
            head.y >= canvas.height / gridSize
        ) {
            gameOver = true;
        }

        // Collision corps
        snake.forEach(part => {
            if (part.x === head.x && part.y === head.y) gameOver = true;
        });

        if (gameOver) return;

        // Ajoute tête
        snake.unshift(head);

        // Mange la nourriture ?
        if (head.x === food.x && head.y === food.y) {
            count++;
            document.getElementById("score").innerText = "Score : " + count + " / 10" + "\nMangez 10 pommes pour sortir de cette serpenterie !";
            generateFood();
        } else {
            snake.pop(); // enlève la queue
        }

        if (count === 10) {
            document.location.href="/index.php";
        }

    }

    // --- AFFICHAGE ---
    function draw() {
        ctx.fillStyle = "#000";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Snake
        ctx.fillStyle = "#0f0";
        snake.forEach(part => {
            ctx.fillRect(part.x * gridSize, part.y * gridSize, gridSize - 1, gridSize - 1);
        });

        // Food
        ctx.fillStyle = "red";
        ctx.fillRect(food.x * gridSize, food.y * gridSize, gridSize - 1, gridSize - 1);

        if (gameOver) {
            ctx.fillStyle = "white";
            ctx.font = "30px monospace";
            ctx.fillText("GAME OVER", 80, 200);
        }
    }

    // --- GAME LOOP ---
    function gameLoop() {
        update();
        draw();
        setTimeout(gameLoop, 120); // vitesse du jeu
    }

    generateFood();
    gameLoop();
</script>

<a href="snake.php" style="padding: 5px; text-decoration: none; color: white; border: 3px solid white; margin: 50px">Rejouer</a>

</body>
</html>
