<form name="ankeet">

    <table>
        </tr>
        <tr>
            <td>
                <label for="nimi">Nimi:</label>
            </td>
            <td>
                <input type="text" name="nimi" id="nimi" placeholder="tekst" oninput="tervist()">
            </td>
            <td>
                <div id="vastus"></div>
            </td>

        </tr>
        <tr>
            <td>
                Millist muusika sa kuulad enam?
            </td>
            <td>
                <div class="radio-container" id="zanr">
                    <input type="radio" class="option-input radio" name="style" id="dzass" value="dzass" onclick="radioValik()">
                    <label for="dzass">Džäss</label>
                    <br>
                    <input type="radio" class="option-input radio" name="style" id="dnb" checked  value="dnb"  onclick="radioValik()">
                    <label for="dnb">Drum and bass</label>
                    <br>
                    <input type="radio" class="option-input radio" name="style" id="hiphop"  value="hiphop" onclick="radioValik()">
                    <label for="hiphop">Hiphop</label>
                    <br>
                    <input type="radio" class="option-input radio" name="style" id="lofi" value="lofi" onclick="radioValik()">
                    <label for="lofi">Lo-Fi</label>
                    <br>
                    <input type="radio" class="option-input radio" name="style" id="hardstyle" value="hardstyle" onclick="radioValik()">
                    <label for="hardstyle">Hardstyle</label>
                    <br>
                    <input type="radio" class="option-input radio" name="style" id="beatbox" value="beatbox"  onclick="radioValik()">
                    <label for="beatbox">Beatbox</label>
                </div>
            </td>
            <td>
                <div id="vastus2"></div>
            </td>
        </tr>
        <tr>
            <td><label for="music">Mida sa arvad muusika kuulamisest koolis?</label></td>
            <td>
                <select name="Musica" id="music" onchange="selectOptionValik()">
                    <option value="vali">Vali...</option>
                    <option value="tuleks">Muusika tuleks koolist keelata</option>
                    <option value="kuulata">Tunnis võib kuulata muusikat</option>
                    <option value="olema">Muusika peab olema valjuhääldi sisse lülitatud.</option>
                    <option value="vaheajal">Me peaksime keelama muusika vaheajal</option>
                </select>
            </td>
            <td><div id="vastus3"></div></td>
        <tr>
            <td>
                <label for="quantity">Kas saate ka muusikat kuulata telefonist?</label>
            </td>
            <td>
                <div class="radio-container">
                    <input type="radio"  class="option-input radio" value="jah" name="ryhm" id="jah" onclick="radiovalik2()">
                    <label class="label1"  for="Jah">Jah</label>
                    <br>
                    <input type="radio" class="option-input radio" value="ei"  name="ryhm" id="ei" onclick="radiovalik2()">
                    <label class="label1" for="Ei">Ei</label>
                </div>
            </td>
            <td><div id="vastus4"></div></td>
        </tr>
        <tr>
            <td>
                <label for="points2">Kas sa kuulad raadiot?:</label>
            </td>
            <td>

                <input type="range" id="points2" name="points" min="0" max="2"  onchange=" odinnull()">
            </td>
            <td><div id="vastus6"></div></td>
        </tr>

        <tr>
            <td><label for="message">Millised raadiojaame oskate nimetada?</label></td>
            <td>
                <textarea name="message" oninput="tervist02()" id="message" style="width: 300px; height: 100px;">
                </textarea>
            </td>
            <td><div id="vastus02"></div></td>

        </tr>
        <tr>
            <td>Kes muusikuid sa tead?</td>
            <td>
                <input type="checkbox" name="beatles" id="beatles" value="beatles" onchange="checkboxValik()">
                <label for="beatles">The Beatles</label><br>
                <input type="checkbox" name="Micheal" id="Micheal"  value="Micheal" onchange="checkboxValik()">
                <label for="Micheal">Michael Jackson</label><br>
                <input type="checkbox" name="Madonna" id="Madonna"  value="Madonna" onchange="checkboxValik()">
                <label for="Madonna">Madonna</label><br>
                <input type="checkbox" name="BobMarley" id="BobMarley" value="BobMarley" onchange="checkboxValik()">
                <label for="BobMarley">Bob Marley</label><br>
                <input type="checkbox" name="cent" id="cent" value="cent" onchange="checkboxValik()">
                <label for="cent">50 cent</label><br>
            </td>
            <td><div id="vastus8"></div></td>
        <tr>
            <td>Milliseid muusikainstrumente sa mängid või sooviksid õppida mängima?</td>
            <td>
                <input type="radio" name="instrument" id="kitarr" value="kitarr" onchange="checkboxValik2()">
                <label for="kitarr">kitarr</label><br>
                <input type="radio" name="instrument" id="klaver" value="klaver" onchange="checkboxValik2()">
                <label for="klaver">klaver</label><br>
                <input type="radio" name="instrument" id="viiul" value="viiul" onchange="checkboxValik2()">
                <label for="viiul">viiul</label><br>
                <input type="radio" name="instrument" id="trummid" value="trummid" onchange="checkboxValik2()">
                <label for="trummid">trummid</label><br>
                <input type="radio" name="instrument" id="muu" value="muu" onchange="checkboxValik2()">
                <label for="muu">muu</label><br>

            </td>
            <td><div id="vastus10"></div></td>
        </tr>
        <tr>
            <td><label for="kontsert">Kas on mõni kontsert või muusikaüritus, kuhu sa unistad minna?</label></td>
            <td><input type="text" name="kontsert"  oninput="tervist03()" id="kontsert" placeholder=""></td>
            <td><div id="vastus9"></div></td>
        </tr>

        <tr>
            <td><label for="musik">Kuidas kasutate muusikat oma igapäevaelus?</label></td>
            <td><input type="text" name="musik" id="musik" oninput="tervist04()" placeholder=""></td>
            <td><div id="vastus04"></div></td>>
        </tr>
    </table>
    <input type="button" value="OK" onclick="koikkokku()">
    <br>
    <div id="koikkokku"></div>
</form>