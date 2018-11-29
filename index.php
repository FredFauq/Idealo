<?php
include_once 'header.php';
?>
<!-- Carousel début -->
<div class="container">
    <h1 class="text-center mb-3">
        Aloe vera, aloe ferox, curcuma, gingembre, açaï... certifiés biologique
        La plus haute qualité biologique depuis 2007</h1>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-wrap="true">
        <div class="carousel-inner row w-100 mx-auto">
            <div class="carousel-item offset-1 col-md-3 active">
                <div class="card text-center">
                    <img class="card-img-top img-fluid" src="assets/img/aloe-vera_800x600.jpg" alt="ALoe Vera">
                    <div class="card-body">
                        <h4 class="card-title">Promo 1</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="card text-center">
                    <img class="card-img-top img-fluid" src="assets/img/aloe-vera_3_800x600.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Promo 2</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="card text-center">
                    <img class="card-img-top img-fluid" src="assets/img/aloe-cut-800x600.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Promo 3</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="card text-center">
                    <img class="card-img-top img-fluid" src="assets/img/aloe-vera-juice-benefits-800x600.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Promo 4</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="card text-center">
                    <img class="card-img-top img-fluid" src="assets/img/aloe-vera-juice-800x600.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Promo 5</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="card text-center">
                    <a href=".modal" id="infoLink" data-toggle="modal" data-target=".modal">
                    <img class="card-img-top img-fluid" src="assets/img/feuilles-fraiches-d-aloe-vera-800x600.jpg" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">Promo 6</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3">
                <div class="card text-center">
                    <img class="card-img-top img-fluid" src="assets/img/aloe-cut-800x600.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Promo 3</h4>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="fas fa-chevron-left fa-2x" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="fas fa-chevron-right fa-2x" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- Carousel fin --> 


<!-- card page -->
<div class="card-deck p-3">
    <!--Card-->
    <div class="card text-center">
        <a href=".modal" id="infoLink" data-toggle="modal" data-target="#infoModal1">
        <img class="card-img-top img-responsive" src="/assets/img/aloe-vera-drink-500-ml-fr.jpg" alt="aloe-vera">
        </a>
        <div class="card-body">
            <h5 class="card-title">Aloé-véra</h5>
            <h6 class="card-subtitle">Boisson multivitaminée</h6>
            <p id = "cardTextInfo1" class="card-text">Un jus de qualité supérieure !</p>
            <p id = "cardTextInfo2" class="card-text">Ingrédients : Aloe Vera 99,8 % (Aloe Vera barbadensis Miller)*, stabilisateur : acide citrique.</p>
            <p id = "cardTextInfo3" class="card-text">(*issu de l’agriculture biologique) </p>
        </div>
        <div class="card-body">
            <!-- Modal --> 
            <a href=".modal" id="infoLink" data-toggle="modal" data-target="#infoModal1"><i class="fas fa-info-circle fa-2x"></i></a>

            <div class="modal" id="infoModal1" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Infos Produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Le jus d’Aloe Vera de Raab possède un taux élevé d’aloverose de 1200 mg par litre (environ 2000 MPS – Multiple Polysaccharides). C’est naturellement un pur jus Bio, qui est obtenu directement par la pression des plantes épluchées à la main, sans filtration ni dilution. Contrôlé par BIO EG-VO 2092/91.
L’Aloe Vera est une plante qui a la capacité exceptionnelle de résister aux longues périodes de chaleur et de sècheresse, tout en conservant une certaine fermeté. En effet, les mucopolysaccharides présents dans la plante permettent de stocker l’humidité à l’intérieur et préviennent le dessèchement des tissus. Le jus d’Aloe Vera Bio de Raab est élaboré à partir de feuilles issues de l’agriculture biologique qui sont pelées manuellement. Il n’y a pas de traces de chlorophylle dans le jus fini, grâce à l’utilisation du gel qui est exclusivement extrait de plantes fraîches. Raab exige de la part de ses ournisseurs mexicains de renoncer catégoriquement à toute utilisation de pesticides et d’engrais artificiels. Raab Vitalfood est membre du « International Aloe Science Council » (IASC).</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            <span class="badge badge-success float-right">Sans gluten - Sans lactose</span>
        </div>
        <div class="card-footer">
            <div>
                <span class="productPrice float-left badge badge-pill badge-info">12€90</span>
                <a class="float-right" href="#" class="card-link"><i class="fas fa-cart-plus fa-2x mr-3"></i></a>
                <a class="float-right" href="#" class="card-link"> <i class="fa fa-share-alt grey-text mr-3"></i></a>
            </div>
            <div class="basePrice float-left font-weight-light pl-3">25€80/l</div>
        </div>
    </div>
    <!--/.Card-->
    <!--Card-->
    <div class="card text-center">
        <a href=".modal" id="infoLink" data-toggle="modal" data-target="#infoModal2">
        <img class="card-img-top img-responsive" src="/assets/img/aloe-vera-bio-1000-ml-.jpg" alt="aloe-vera">
        </a>
        <div class="card-body">
            <h5 class="card-title">Aloé-véra</h5>
            <h6 class="card-subtitle">Boisson multivitaminée</h6>
            <p class="card-text">Un jus de qualité supérieure !</p>
            <p class="card-text">Ingrédients : Aloe Vera 99,8 % (Aloe Vera barbadensis Miller)*, stabilisateur : acide citrique.</p>
            <p class="card-text">(*issu de l’agriculture biologique) </p>
        </div>
        <div class="card-body">
           <!-- Modal --> 
            <a href=".modal" id="infoLink" data-toggle="modal" data-target="#infoModal2"><i class="fas fa-info-circle fa-2x"></i></a>

            <div class="modal" id="infoModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Infos Produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Texte de infoModal </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            <span class="badge badge-success float-right">Sans gluten - Sans lactose</span>
        </div>
        <div class="card-footer">
            <div>
                <span class="productPrice float-left badge badge-pill badge-info">12€90</span>
                <a class="float-right" href="#" class="card-link"><i class="fas fa-cart-plus fa-2x mr-3"></i></a>
                <a class="float-right" href="#" class="card-link"> <i class="fa fa-share-alt grey-text mr-3"></i></a>
            </div>
            <div class="basePrice float-left font-weight-light pl-3">25€80/l</div>
        </div>
    </div>
    <!--/.Card-->
    <!--Card-->
    <div class="card text-center">
        <a href=".modal" id="infoLink" data-toggle="modal" data-target=".modal">
        <img class="card-img-top img-responsive" src="/assets/img/aloe-vera-drink-500-ml-fr.jpg" alt="aloe-vera">
        </a>
        <div class="card-body">
            <h5 class="card-title">Aloé-véra</h5>
            <h6 class="card-subtitle">Boisson multivitaminée</h6>
            <p class="card-text">Un jus de qualité supérieure !</p>
            <p class="card-text">Ingrédients : Aloe Vera 99,8 % (Aloe Vera barbadensis Miller)*, stabilisateur : acide citrique.</p>
            <p class="card-text">(*issu de l’agriculture biologique) </p>
        </div>
        <div class="card-body">

            <!-- Modal --> 
            <a href=".modal" id="infoLink" data-toggle="modal" data-target=".modal"><i class="fas fa-info-circle fa-2x"></i></a>

            <div class="modal" id="infoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Infos Produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Texte descriptif</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            <span class="badge badge-success float-right">Sans gluten - Sans lactose</span>
        </div>
        <div class="card-footer">
            <div>
                <span class="productPrice float-left badge badge-pill badge-info">12€90</span>
                <a class="float-right" href="#" class="card-link"><i class="fas fa-cart-plus fa-2x mr-3"></i></a>
                <a class="float-right" href="#" class="card-link"> <i class="fa fa-share-alt grey-text mr-3"></i></a>
            </div>
            <div class="basePrice float-left font-weight-light pl-3">25€80/l</div>
        </div>
    </div>
    <!--/.Card-->
    <!--Card-->
    <div class="card text-center">
        <a href=".modal" id="infoLink" data-toggle="modal" data-target=".modal">
        <img class="card-img-top img-responsive" src="/assets/img/aloe-vera-bio-1000-ml-.jpg" alt="aloe-vera">
        </a>
        <div class="card-body">
            <h5 class="card-title">Aloé-véra</h5>
            <h6 class="card-subtitle">Boisson multivitaminée</h6>
            <p class="card-text">Un jus de qualité supérieure !</p>
            <p class="card-text">Ingrédients : Aloe Vera 99,8 % (Aloe Vera barbadensis Miller)*, stabilisateur : acide citrique.</p>
            <p class="card-text">(*issu de l’agriculture biologique) </p>
        </div>
        <div class="card-body">
            <!-- Modal --> 
            <a href=".modal" id="infoLink" data-toggle="modal" data-target=".modal"><i class="fas fa-info-circle fa-2x"></i></a>

            <div class="modal" id="infoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Infos Produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Nouveau texte</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            <span class="badge badge-success float-right">Sans gluten - Sans lactose</span>
        </div>
        <div class="card-footer">
            <div>
                <span class="productPrice float-left badge badge-pill badge-info">12€90</span>
                <a class="float-right" href="#" class="card-link"><i class="fas fa-cart-plus fa-2x mr-3"></i></a>
                <a class="float-right" href="#" class="card-link"> <i class="fa fa-share-alt grey-text  mr-3"></i></a>
            </div>
            <div class="basePrice float-left font-weight-light pl-3">25€80/l</div>
        </div>
    </div>
    <!--/.Card-->
</div>
<!-- fin card page -->
<!-- debut bouton top page -->
<button onclick="topFunction()" id="topBtn" title="topBtn">Top</button>
<!-- fin bouton top page -->
<!-- inclusion du footer -->
<?php
include_once 'footer.php';
?>
        