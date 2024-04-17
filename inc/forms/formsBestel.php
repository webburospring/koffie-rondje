<div class="d-flex mt-4 justify-content-center ">
    <!-- <button class="btn btn-primary" type="submit" onclick="random()">Random</button> -->
    <p id="geselecteerdeGebruiker"></p>
    <p></p> 
    </div>
    <div class="container d-flex ">
        <div class="row d-flex justify-content-center">
            <?php
                $sql = "SELECT naam, fotopath FROM foto";
                $result = mysqli_query($conn, $sql);
            ?>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div  class="col-md-2 mb-3 m-2 rounded  shadow bg-light px-4 pt-4">
                            <form action="" id="bestelling" method="post">
                            <button onclick="refreshDiv()" id="bestelling1" class="bestelling<?php echo $row['naam']; ?> " type="submit" value="<?php echo $row['naam']; ?>" name="<?php echo $row['naam'] ?>">
                                <img class="img-fluid rounded shadow imgGrijs"  src="<?php echo $row['fotopath']; ?>" alt="drinken">
                            </button>
                            </form>
                            <h3 class="text-dark text-center"><?php echo $row["naam"]; ?> </h3>
                        </div> <?php
                    }
                }
                ?>
            <?php
            mysqli_close($conn);
            ?>
        </div>
    </div>