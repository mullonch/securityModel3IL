<div class="py-5 mx-0 bg-secondary">
    <div class="container px-0 my-5 bg-secondary">
        <div class="row mx-0">

            <?php for($i = 0; $i <63; $i++){ ?>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            This is some text within a card body.
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