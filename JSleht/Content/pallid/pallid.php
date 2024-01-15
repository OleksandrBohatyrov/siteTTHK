
<!--<body onload="setInterval('liigu()', 100)">-->
<h2>Palli liikumine</h2>
 <canvas id="tahvel" width="300" height="200" onmousemove="changeColor()"
 style="background-color:yellow"></canvas><br />
 <input type="button" value="&lt;-" onclick="vasakule()" />
<input type="button" value="Värv" onclick="changeColor()" />
 <input type="button" value="x" onclick="seis()" />
 <input type="button" value="-&gt;" onclick="paremale()" />
<input type="button" value="y;" onclick="alla()" />
<input type="button" value="-y;" onclick="ylesale()" />
 </body>