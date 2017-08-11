<?PHP include_once('common/header.php'); ?>
<!-- –––––––––––––––[ PAGE CONTENT ]––––––––––––––– -->
<main id="mainContent" class="main-content">
    <!-- Page Container -->
    <div class="page-container ptb-20">
        <div class="container">
            <section class="stores-area stores-area-v2">
                <h3 class="mb-40 t-uppercase">View deals by stores</h3>                
                <div class="letters-toolbar p-10 panel mb-40">
                    <span class="all-stores"><a href="#">All stores</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores" onclick="char_value(<?PHP echo 'A' ?>)">A</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'B'; ?>"">B</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'C'; ?>">C</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'D'; ?>">D</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'E'; ?>">E</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'F'; ?>">F</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'G'; ?>">G</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'H'; ?>">H</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'I'; ?>">I</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'J'; ?>">J</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'K'; ?>">K</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'L'; ?>">L</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'M'; ?>">M</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'N'; ?>">N</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'O'; ?>">O</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'P'; ?>">P</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'Q'; ?>">Q</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'R'; ?>">R</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'S'; ?>">S</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'T'; ?>">T</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'U'; ?>">U</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'V'; ?>">V</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'W'; ?>">W</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'X'; ?>">X</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'Y'; ?>">Y</a></span>
                    <span><a href="<?PHP echo base_url() ?>index/stores/<?PHP echo 'Z'; ?>">Z</a></span>
                </div>
                <div class="row row-rl-15 row-tb-15 stores-cat">
                    <?PHP
//                    echo "<pre>";
//                    print_r($all_stores);
//                    exit;
                    foreach ($all_stores as $store_details) {
                        ?>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="<?PHP echo $store_details->store_link; ?>" class="is-block">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <div class="store-logo view view-fifth view view-fifth">
                                        <img src="<?PHP echo $store_details->store_image; ?>" alt="">
                                        <div class="mask">
                                            <h6><?PHP echo $store_details->store_name; ?></h6> 												 
                                            <a href="<?PHP echo $store_details->store_link; ?>" target="_blank" class="info">73 Offers</a>
                                        </div>
                                    </div>
                                </div>
                                <?PHP
                                if (empty($store_details->store_name)) {
                                    $name = explode('.', $store_details->offer_name);
                                    $store_name = $name[0];
                                    ?>
                                    <h6 class="store-name ptb-10 t-center" id="store_url"><a href="<?PHP echo $store_details->store_url; ?>" target="_blank" ><?PHP echo $store_name; ?></a></h6>
                                <?PHP } else { ?>
                                    <h6 class="store-name ptb-10 t-center" id="store_url"><a href="<?PHP echo $store_details->store_url; ?>" target="_blank" ><?PHP echo $store_details->store_name; ?></a></h6><?PHP } ?>
                            </a>
                        </div>

                    <?PHP }
                    ?>                 

                </div>                
            </section>
            <?PHP // echo $links ; ?>
        </div>
    </div>
    <!-- End Page Container -->


</main>

<!-- –––––––––––––––[ END PAGE CONTENT ]––––––––––––––– -->
<?php include_once('common/footer.php') ?>
<!--<script type="text/javascript">
        $("h6").mouseover(function () {
            var storeName= $(this).text();
//            alert(storeName);
 $.post(
 "<?PHP echo base_url(); ?>index/stores/storeName"
     )

        });
</script>-->-->

<script type ="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
                        function char_value(val) {
                            var id = val;
//                            alert(id);
                            $.ajax({
                                type: "post",
                                url: "<?php echo base_url().'index/stores'; ?>",
                                data: {id: id},
                                cache: false,
                                async: false,
                                success: function (result) {
                                    console.log(result);
                                }
                            });
                        }
</script>