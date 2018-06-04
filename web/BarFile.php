
var myCanvas = document.getElementById("myCanvas");
myCanvas.width = 300;
myCanvas.height = 300;
 
var ctx = myCanvas.getContext("2d");

drawBar(ctx, 600)

function drawBar(canvas, index, number, max){
    var lettervec = "ABCDEFGHI";
    var xvec = [25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300]
    var yvec = [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300]

    canvas = canvas.getContext("2d");

    ratio = max/250;

    for(i = 0; i < 13; i++){
        drawLine(canvas, xvec[i], 0, xvec[i], 300);
        drawLine(canvas, 25, yvec[i], 300, yvec[i]);
        if(yvec[i] > 0){
         canvas.font = "bold 10px Arial";
         canvas.fillText((yvec[i]*ratio), 5, 300 - yvec[i]);
        }
    }

    var colorarr = ['#17A589', '#5B2C6F', '#707B7C', '#F4D03F', '#283747', '#943126', '#5B2C6F','#C6DDB0', '#C68490']
    var startx = 50;
    var transfervec = [];

    for(i=0; i < number; i++){
        transfervec[i] = (globalValMatrix[index-1][i]/ratio);
    }

    for(i=0; i < 7; i++){
        canvas.beginPath();
        canvas.fillStyle = colorarr[i];
        canvas.lineWidth="2";
        canvas.fillRect(startx, 300 - transfervec[i], 25, transfervec[i]);
        canvas.font = "bold 8px Arial";
        canvas.fillText(lettervec[i], startx + 10, (300 - transfervec[i] - 7));
        canvas.stroke();
        startx += 25
    }
}