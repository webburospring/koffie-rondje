<table id="tabelGeselecteerd"
                class=" table table-striped table-dark d-flex mt-4 justify-content-center">
                <tr>
                    <th class="p-2 rounded border">Geselecteerde gebruiker</th>
                </tr>
                    <?php

                    $sql4 = "SELECT notificatie FROM desktopnotificatie ORDER BY tijd ASC LIMIT 1";
                    $result = mysqli_query($conn, $sql4);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $firstNotificatie = $row["notificatie"];
                        
                        if ($firstNotificatie == $_SESSION['naam']) {
                            // echo 'je bent  de eerste';
                            
                            $sql5 = "INSERT INTO geselecteerdegebruiker (geselecteerdegebruiker) VALUES ('$firstNotificatie')";
                            $tijd = mysqli_query($conn, $sql5);
                            ?>
                            <tr>
                                <td id="geselecteerdeGebruikerTr" class="p-2 border geselecteerdeGebruiker">
                                    
                                    <?php echo $firstNotificatie; ?>
                                </td>
                            </tr>
                            <?php
                        } else if ($firstNotificatie != $_SESSION['naam']) {
                            // echo 'je bent niet de eerste';
                            ?>
                            <tr>
                                <td id="geselecteerdeGebruikerTr" class="p-2 border geselecteerdeGebruiker">
                                    
                                    <?php echo $firstNotificatie; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                    }
                ?>

                <script>
            </script>

                </table>