<form name="ankeet">

    <table>
        </tr>
        <tr>
            <td>
                Nimi
            </td>
            <td>
                <label for="nimi" ></label>
                <input type="text" id="nimi" name="nimi" placeholder="tekst" oninput="tervist()">
                <div id="vastus"></div>
            </td>
        </tr>
        <tr>
            <td>
                Rühm
            </td>
            <td>
                <div class="radio-container">
                    <input type="radio"  class="option-input radio" name="ryhm" id="tarpv21"  onclick="radioValik()">
                    <label for="tarpv21">TARpv21</label>
                    <br>
                    <input type="radio" class="option-input radio"  name="ryhm" id="tarpv22" checked onclick="radioValik()">
                    <label for="tarpv22">TARpv22</label>
                    <br>
                    <input type="radio" class="option-input radio"  name="ryhm" id="tarpv23" onclick="radioValik()">
                    <label for="tarpv23">TARpv23</label>
                    <br>
                    <input type="radio"  class="option-input radio" name="ryhm" id="tarpv23_5" onclick="radioValik()">
                    <label for="tarpv23_5">TARpv23.5</label>
                    <br><br>
                    <div id="vastus2"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td><strong>Vali oma spordialad!</strong></td>
            <td>
                <label for="ujumine">Ujumine</label>
                <input type="checkbox" name="ujumine" id="ujumine" value="ujumine" onchange="checkboxValik()">
                <br>
                <label for="jousaal">Jõusaal</label>
                <input type="checkbox" name="jousaal" id="jousaal" value="jousaal" onchange="checkboxValik()">
                <br>
                <label for="kasipall">Kässiapall</label>
                <input type="checkbox" name="kasipall" id="kasipall" value="kasipall" onchange="checkboxValik()">
                <br>
                <label for="vorkpall">Võrkpall</label>
                <input type="checkbox" name="vorkpall" id="vorkpall" value="vorkpall"  onchange="checkboxValik()">
                <br>
                <label for="korvpall">Korvpall</label>
                <input type="checkbox" name="korvpall" id="korvpall" value="korvpall" onchange="checkboxValik()">
                <br>
                <div id="vastus3"></div>
            </td>
        </tr>
        <tr>
            <td>
                <strong><label for="elu">Kus sa elad?</label></strong>
            </td>
            <td>
                <select name="elukoht" id="elu" onchange=" selectOptionValik2()">
                    <option value="Vali">Vali...</option>
                    <option value="Tallinn">Tallinn</option>
                    <option value="Tartu">Tartu</option>
                    <option value="Narva">Narva</option>
                    <option value="Paide">Paide</option>
                    <option value="Keila">Keila</option>
                </select>

                <br>
            </td>
        </tr>

        <tr>
            <td>
                <label for="distance">Marafooni distanss on </label>
            </td>
            <td>
                <input type="range" id="distance"  min="0" max="100" onchange=" selectOptionValik2()">
                <div id="vastus5"></div>
            </td>
        </tr>
        <tr>
            <td><strong>Vali oma T-särgi värv</strong></td>
            <td>
                <label for="color">Color</label>
                <input type="color" name="color" id="color" onchange="selectOptionValik2()">
            </td>
        </tr>

        <tr>
            <td>
                <label for="birthday">Sünnipäev:</label>
            </td>
            <td>
                <input type="date" id="birthday" name="birthday">
            </td>
        </tr>
        <tr>
            <td>
                <label for="birthdaytime">Sünnipäev (kuupäev ja kellaaeg):</label>
            </td>
            <td>
                <input type="datetime-local" id="birthdaytime" name="birthdaytime">
            </td>
        </tr>
        <tr>
            <td>
                <label for="myfile">Vali faili:</label>
            </td>
            <td>
                <input type="file" id="myfile" name="myfile">
            </td>
        </tr>
        <tr>
            <td>
                <label for="quantity">Kogus (vahemikus 1 kuni 5):</label>
            </td>
            <td>
                <input type="number" id="quantity" name="quantity" min="1" max="5">
            </td>
        </tr>
        <tr>
            <td>
                <label for="quantity">Mitu korda päevas te treenite:</label>
            </td>
            <td>
                <input type="number" id="quantity2" name="quantity2" min="0" max="100" step="10" value="30">
            </td>
        </tr>
        </tr>
        <tr>
            <td><label for="message">Type something</label></td>
            <td>
                <textarea name="message" id="message" style="width: 300px; height: 100px;">
                4to-to...
                </textarea>
            </td>
        </tr>
        <tr>
            <td><label for="cars">Valige auto:</label></td>
            <td>
                <select  name="cars" id="cars">
                    <optgroup label="Swedish Cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                    </optgroup>
                    <optgroup label="German Cars">
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </optgroup>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="Trennis">Valige oma lemmik treeningtüüp</label>
            </td>
            <td>
                <input list="Trennis" name="vid" id="vid">
                <datalist id="Trennis">
                    <option value="Jalad" id="jalad" onchange="checkboxValik()">
                    <option value="Käed" id="kaed" onchange="checkboxValik()">
                    <option value="Õlad" id="olad" onchange="checkboxValik()">

                </datalist>
            </td>
        </tr>


        <tr>
            <td>
                <label for="week">Valige nädal:</label>
            </td>
            <td>
                <input type="week" id="week" name="week">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit">
            </td>
            <td>
                <input type="reset">
            </td>
        </tr>
    </table>
</form>