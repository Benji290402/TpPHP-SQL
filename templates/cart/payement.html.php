<main id="mainPayement">
    <h2>Paiement</h2>
    <form id="formPayement">
        <div>
            <h3>Adresse</h3>
            <div>
                <div class="inputDiv">
                    <label for="num">N° de rue :</label>
                    <input placeholder="32" id="num" name="number" type="text" required>
                </div>
                <div class="inputDiv">
                    <label for="street">Rue :</label>
                    <input placeholder="Rue des chats" id="street" name="street" type="text" required>
                </div>
            </div>
                <div class="inputDiv">
                    <label for="postal">Code Postal :</label>
                    <input placeholder="01234" id="postal" name="postalCode" type="text" required>
                </div>
                <div class="inputDiv">
                    <label for="city">Ville :</label>
                    <input placeholder="Aix en Provence" id="city" name="city" type="text" required>
                </div>
        </div>
        <div>
            <h3>Méthode de paiement</h3>
            <div class="inputDiv">
                <label for="numCard">Numéro de carte :</label>
                <input placeholder="0123 4567 8901 2345" id="numCard" name="numCard" type="text" required>
            </div>
            <div>
                <div class="inputDiv">
                    <label for="nameCard">Nom présent sur la carte :</label>
                    <input placeholder="Dupont" id="nameCard" name="nameCard" type="text" required>
                </div>
                <div class="inputDiv">
                    <label for="dateCard">Date d'expiration :</label>
                    <input placeholder="10/22" id="dateCard" name="expirationDate" type="text" required>
                </div>
                <div class="inputDiv">
                    <label for="ccv">CCV :</label>
                    <input placeholder="123" id="ccv" name="ccv" type="text" required>
                </div>
            </div>
        </div>
    </form>
    <button onclick="redirectForm()">Commander</button>
</main>