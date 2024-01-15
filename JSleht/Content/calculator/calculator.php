<div class="container">
<form name="kalk">

    <label for="kogus">Mitu saia sina soovid?</label>
    <input type="number" min="1" max="10" step="1" id="kogus" name="kogus">
    <!--tekst kast -->
    <br>
    <label for="saiatyyp">Millist saia? (juustu -1&euro;, magus--3&euro;, pontsik--2&euro;)</label>
    <input type="text" id="saiatyyp" oninput="inputTextValue()">
    <br>
    -------------------
    <br>
    <label for="saiatyyp2">Vali saia tüüp:</label>
    <select id="saiatyyp2" onchange="selectOptionChange(event)">
        <option value="">Vali...</option>
        <option value="pontsik">pontsik</option>
        <option value="magus">magus sai</option>
        <option value="juustu">juustu sai</option>
    </select>
</form>

<br>-------------<br>
<form name="kalk2">
    <div>
        <strong>Tee oma valik:</strong>
        <br>
        <input type="radio" id="magus" name="saiatyyp3" value="magus" onchange="radioChange(event)">
        <label for="magus">magus</label>
        <br>
        <input type="radio" id="juustu" name="saiatyyp3" value="juustu" onchange="radioChange(event)">
        <label for="juustu">juustu</label>
        <br>
        <input type="radio" id="pontsik" name="saiatyyp3" value="pontsik" onchange="radioChange(event)">
        <label for="pontsik">pontsik</label>
    </div>

    <input type="button" class="but" value="Arvuta" onclick="inputTextValue()">
    <div id="vastus">Hind on</div>

    <hr>

    <table>

        <tr>
            <td width="40%">
                <label for="saiatyyp3">Millist saia? (juustu -1&euro;, magus--3&euro;, pontsik--2&euro;)</label>
                <input type="text" id="saiatyyp3" oninput="inputTextValue3()">
            </td>
            <td>
                <label for="saiatyyp4">Vali saia tüüp:</label>
                <select id="saiatyyp4" onchange="selectOptionChange4(event)">
                    <option value="">Vali...</option>
                    <option value="pontsik">pontsik</option>
                    <option value="magus">magus sai</option>
                    <option value="juustu">juustu sai</option>
                </select>
            </td>
            <td>
                <strong>Tee oma valik:</strong>
                <br>
                <input type="radio" id="magus2" name="saiatyyp5" value="magus2" onchange="radioChange2(event)">
                <label for="magus2">magus</label>
                <br>
                <input type="radio" id="juustu2" name="saiatyyp5" value="juustu2" onchange="radioChange2(event)">
                <label for="juustu2">juustu</label>
                <br>
                <input type="radio" id="pontsik2" name="saiatyyp5" value="pontsik2" onchange="radioChange2(event)">
                <label for="pontsik2">pontsik</label>
            </td>
            <td>
                <strong>Tee oma valik:</strong>
                <br>
                <input type="checkbox" id="magus3" name="saiatyyp6" value="magus3" onchange="checkChange()">
                <label for="magus3">magus</label>
                <br>
                <input type="checkbox" id="juustu3" name="saiatyyp6" value="juustu3" onchange="checkChange()">
                <label for="juustu3">juustu</label>
                <br>
                <input type="checkbox" id="pontsik3" name="saiatyyp6" value="pontsik3" onchange="checkChange()">
                <label for="pontsik3">pontsik</label>
            </td>
        </tr>
    </table>
    <label for="kogus2">Mitu saia sina soovid?</label>
    <input type="number" min="1" max="10" step="1" id="kogus2" name="kogus2">
    <div id="vastus2">Hind on</div>
</div>