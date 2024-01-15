<h1>Joonis</h1>
    <main>
        <!-- <canvas id="kanva">
        </canvas>
            <br>
            <input type="button" value="kustuta" onclick="kustuta()">
            <input type="button" value="joon" onclick="joon()">

                <br>

                <label for="laius">Laius</label>
                <input type="number" id="laius" min="10">
                <label for="korgus">Kõrgus</label>
                <input type="number" id="korgus">
                <input type="button" value="ristkülik" onclick="ristkylik()">
                <input type="button" value="ring" onclick="ring()">
                <br>
                <br><br> -->
        <canvas id="kanva2" width="500" height="400">
        </canvas>

        <input class="joon" type="button" value="kustuta" onclick="kustuta2()">
        <input type="button" value="joon" onclick="drawall()">
        <br>
        <input class="joon" type="button" id="1" value=" " onclick="drawFace()">
        <label for="1">Nägu</label>
        <br>
        <input class="joon"  type="button" id="2" value=" " onclick="drawLeftEye()">
        <label for="2">Vasak silm</label>

        <input class="joon" type="button" id="3" value=" " onclick="drawRightEye()">
        <label for="3">Parem silm</label>
        <br>

        <input class="joon"  type="button" id="4" value=" " onclick="drawLeftEar()">
        <label for="4">Vasak kõrv</label>

        <input class="joon" type="button" id="5" value=" " onclick="drawRightEar()">
        <label for="5">Parem kõrv</label>
        <br>
        <input class="joon" type="button" id="6" value=" " onclick="drawNose()">
        <label for="6">Nina</label>
        <br>
        <input class="joon" type="button" id="7" value=" " onclick="drawMouth()">
        <label for="7">Suu</label>
        <br>
        <input class="joon" type="button" id="8" value=" " onclick="drawBody()">
        <label for="8">Tulv</label>
        <br>
        <input class="joon"  type="button" id="9" value=" " onclick="drawLegs()">
        <label for="9">Jalad</label>
        <br>

        <input class="joon" type="button" id="10" value=" " onclick="drawLeftArm()">
        <label for="10">Vasak käsi</label>

        <input class="joon" type="button" id="11" value=" " onclick="drawRightArm()">
        <label for="11">Parem käsi</label>