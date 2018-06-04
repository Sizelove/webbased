<html>
	<body>
   		<canvas id="myCanvas"></canvas>
	</body>

<script>
var myCanvas = document.getElementById("myCanvas");
myCanvas.width = 300;
myCanvas.height = 300;
var ctx = myCanvas.getContext("2d");

drawLine(ctx, 100, 100, 200, 200)
drawLine(ctx, 100, 100, )
drawArc(ctx, 100, 100, 141.4, 0, Math.PI/3);
 
function drawLine(ctx, startX, startY, endX, endY){
    ctx.beginPath();
    ctx.moveTo(startX,startY);
    ctx.lineTo(endX,endY);
    ctx.stroke();
}

function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.stroke();
}


</script>
</html>