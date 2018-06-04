function drawPie(canvas, i, number, total){
    alert("This was called");
    var colorarr = ['#17A589', '#5B2C6F', '#707B7C', '#F4D03F', '#283747', '#943126', '#5B2C6F','#C6DDB0', '#C68490']
    var lettervec = "ABCDEFGHI";
    arcval = 0;
    canvase = canvas
    context = canvase.getContext("2d");
    for(count = 0; count < number; count++){
        arcvalold = arcval;
        canvase = newdivers;
        val = ((2*Math.PI)*globalValMatrix[i-1][count])/total
        val2 = (globalValMatrix[i-1][count]/total)*100
        rad = Math.min(canvase.width/2, canvase.height/2)

        arcval += val
        drawPieSlice(context, 150, 150, 150, arcvalold, arcval, colorarr[count])
        var labelX = (canvase.width/2 + (rad / 2) * Math.cos((arcvalold + arcval)/2));
        var labelY = (canvase.height/2 + (rad / 2) * Math.sin((arcvalold + arcval)/2));

        val3 = val2.toFixed(1)
        context.fillStyle = "white";
        context.font = "bold 12px Arial";
        context.fillText(lettervec[count] + " " + val3 + '%', labelX,labelY);
    }
 }

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


function drawLine(canvas4, startX, startY, endX, endY){
    canvas4.beginPath();
    canvas4.moveTo(startX,startY);
    canvas4.lineTo(endX,endY);
    canvas4.stroke();
}

function drawArc(ctx, centerX, centerY, radius, startAngle, endAngle){
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.stroke();
}

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.moveTo(centerX,centerY);
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fill();
}

function bigPie(coder){
    parentdiv = coder.parentNode;
    newcan = document.getElementById("bigpie")
    if(newcan){
        newcan.parentNode.removeChild(newcan);
    }
    newcan = document.createElement("canvas")
    newcan.setAttribute("id", "bigpie")
    newcan.width = 500;
    newcan.height = 500;

    parentdiv.appendChild(newcan);

    highsum= 0;
    num = [];

    for(i = 0; i < numexp; i++){
        num[i] = 0;
        for(int=0; int < 9; int++){
            if(globalValMatrix[i][int] != null){
                highsum += globalValMatrix[i][int]
                num[i]++;
            }
            else{break;}
        }
    }
    var colorarr = ['#AB9FBA', '#a4e2da', '#F0DAEC', '#a4e0a0', '#eeb7b6', '#D6C9E0', '#8AB9C8', '#C6DDB0', '#C68490']
    var lettervec = "ABCDEFGHI";
    arcval = 0;
    canvase = newcan;
    context = newcan.getContext("2d");
    firstang = [];
    endang = [];
    val3 = [];
    for(i = 0; i < numexp; i++){
        firstang[i] = arcval;
        val3[i] = 0;
        for(int = 0; int < num[i]; int++){
            arcvalold = arcval;

            val = ((2*Math.PI)*globalValMatrix[i][int])/highsum
            val2 = (globalValMatrix[i][int]/highsum)*100
            rad = Math.min(canvase.width/2, canvase.height/2)

            arcval += val
            drawPieSlice(context, 250, 250, 250, arcvalold, arcval, colorarr[i])
            val2 = val2.toFixed(1)
            val3[i] += parseFloat(val2);
        }
        endang[i] = arcval;
    }
    for(i=0;i<numexp;i++)
    {
        var labelX = (canvase.width/2 + (rad / 2) * Math.cos((firstang[i] + endang[i])/2));
        var labelY = (canvase.height/2 + (rad / 2) * Math.sin((firstang[i] + endang[i])/2));
        context.fillStyle = "white";
        context.font = "bold 12px Arial";
        index = i + 1
        textgetter = document.getElementById("nametab" + index)
        percent = val3[i]
        context.fillText(textgetter.value + " " + percent.toFixed(1) + '%', labelX,labelY);
    }
 }