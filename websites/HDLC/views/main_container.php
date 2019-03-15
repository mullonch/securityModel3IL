<div class="py-5 mx-0 bg-secondary">
    <div class="container px-0 my-5 bg-secondary">
        <div class="row mx-0">

            <?php for($i = 0; $i <63; $i++){ ?>

                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="images/index.svg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Libellé</h5>
                            <p class="card-text">Description</p>
                            <a href="#" class="btn btn-primary">Ajouter au panier</a>
                        </div>
                    </div>
                </div>

                <?php 
                    if(($i+1)%4===0){
                        ?><div class="w-100 my-3"></div><?php
                    }

                ?>


            <?php } ?>

        <div>
    </div>
</div>