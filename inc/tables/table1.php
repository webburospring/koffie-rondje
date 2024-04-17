<table id="tabel"
                        class="table table-striped table-dark d-flex mt-4 justify-content-center tableSelecteerGebruiker">
                        <tr>
                            <th class="p-2 rounded border">Bestellingen</th>
                            <th class="p-2 rounded border">Gebruiker</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <tr id="tableSelecteerGebruiker" class="tableSelecteerGebruiker">
                                    <td  class="p-2 border tableTd ">
                                        <?php echo $row['bestelling']; ?>
                                    </td>
                                    <td id="tableTdGebruiker" class="p-2 border tableTd tableTdGebruiker">
                                        <?php echo $row['gebruiker']; ?>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {
                            ?>
                            <tr id="tableSelecteerGebruiker" class="tableSelecteerGebruiker">
                                <td id="geenBestellingen" class="geenBestellingen border" colspan="2">Geen bestellingen</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>