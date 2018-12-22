        <?php
            
            if (array_key_exists("flash", $_SESSION)) {

                ?>

                    <div class="alert alert-<?= $_SESSION['flash'][0] ?>">
                        <span class="text-muted"><?= $_SESSION['flash'][1] ?></span>
                    </div>
                
                <?php

                unset($_SESSION['flash']);

            }

        ?>
