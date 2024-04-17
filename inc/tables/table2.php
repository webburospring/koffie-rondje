<table id="tabel" class="table table-striped table-dark d-flex mt-4 justify-content-center">
                        <tr>
                            <th class="p-2 rounded border">Actieve gebruikers</th>
                        </tr>
                        <?php
                        $actieveGebruikers = array();
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $gebruiker = $row['gebruikeringelogd'];
                                // Check if the user is already in the array
                                if (!in_array($gebruiker, $actieveGebruikers)) {
                                    array_push($actieveGebruikers, $gebruiker);
                        ?>
                                    <tr class="fixedHeight">
                                        <td class="p-2 border">
                                            <?php echo $gebruiker; ?>
                                        </td>
                                    </tr>
                        <?php
                                } 
                            }
                        } else {
                        ?>
                            <tr class="fixedHeight">
                                <td id="geenBestellingen" class="geenBestellingen border" colspan="2">Geen actieve gebruikers</td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>