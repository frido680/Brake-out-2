let canvas = document.getElementById("game");
let ctx = canvas.getContext('2d');
let ballRadius = 9;
let x = canvas.width / (Math.floor(Math.random() * Math.random() * 10) + 3);
let y = canvas.height - 40;
let dx = 5;
let dy = -5;

let paddleHeight = 15;
let paddleWidth = 72;

function setScore(score){
    var user = document.getElementById("userid").innerHTML;
    fetch("setScore.php?p=" + user + ";" + score, {
        method: "POST",
      });
}

function drawPaddle() 
{
    ctx.beginPath();
    ctx.roundRect(paddleX, canvas.height - paddleHeight, paddleWidth,
        paddleHeight, 30);
    ctx.fillStyle = "#ff834d";
    ctx.fill();
    ctx.closePath();
}

let paddleX = (canvas.width - paddleWidth)/2;

document.addEventListener("mousemove", mouseMoveHandler, false);

function mouseMoveHandler(e) {
    var relativeX = e.clientX - canvas.offsetLeft;
    if (relativeX > 0 && relativeX < canvas.width) {
        paddleX = relativeX - paddleWidth / 2;
    }
}
let rowCount = 5;
let columnCount = 9;
let brickWidth = 54;
let brickHeight = 12;
let brickPadding = 12;
let topOffset = 40;
let leftOffset = 33;
let score = 0;

let bricks = [];
for (let i = 0; i < columnCount; i++) {
    bricks[i] = [];
    for (let j = 0; j < rowCount; j++) {
        bricks[i][j] = {x:0,y:0, status:1};
    }
}

function drawBricks() {
    for (let i = 0; i < columnCount; i++) {
        
        for (let j = 0; j < rowCount; j++) {
            if (bricks[i][j].status === 1) {
                let brickX = (i * (brickWidth + brickPadding)) + leftOffset;
                let brickY = (j * (brickHeight + brickPadding)) + topOffset;
                bricks[i][j].x = brickX;
                bricks[i][j].y = brickY;
                ctx.beginPath();
                ctx.roundRect(brickX,brickY,brickWidth,brickHeight,30);
                ctx.fillStyle = '#ff834d';
                ctx.fill();
                ctx.closePath();
            }
        }
    }
}

function drawBall() {
    ctx.beginPath();
    ctx.arc(x,y,ballRadius,0,Math.PI*2);
    ctx.fillStyle = '#333';
    ctx.fill();
    ctx.closePath();
}

function hitDetection() {
    for (let i = 0; i < columnCount; i++) {
        for (let j = 0; j < rowCount; j++) {
            let b = bricks[i][j];
            if (b.status === 1) {
                if (x > b.x && x < b.x + brickWidth && y > b.y && y < b.y + 
                    brickHeight) {
                    dy = -dy;
                    b.status = 0;
                    score++;

                    if (score === rowCount*columnCount) {
                        setScore(score);
                        alert("Nyertél!");
                        document.location.reload();
                    }
                }
            }
        }
    }
}

function trackScore() { 
    ctx.font = "bolder 16px sans-serif";
    ctx.fillStyle = "#fff";
    ctx.fillText("Pont: "+score,8,24);
}

function init() { //inicializálás
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    drawPaddle();
    drawBricks();
    drawBall();
    hitDetection();
    trackScore();

    //Bal és jobb falak
    if (x + dx > canvas.width - ballRadius || x + dx < ballRadius)
    {
        dx = -dx;
    }

    //Felső fal
    if (y + dy < ballRadius) {
        dy = -dy;
    }
    else if (y + dy > canvas.height - ballRadius) {
        //Paddle találat
        if (x > paddleX && x < paddleX + paddleWidth) {
            dy = -dy;
        } else {
            //kiesik
            setScore(score);
            alert("Vége! "+ score + " pontod lett!");
            document.location.reload();
        }
    }
    if (y + dy > canvas.height - ballRadius || y + dy < ballRadius) {
        dy = -dy;
    }

    x += dx;
    y += dy;
}

function start() {
    setInterval(init,5);
}

function resetGame() {
    location.reload();
}

