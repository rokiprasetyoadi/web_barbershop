<!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Karyawan
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <a class="btn btn-primary" href="<?= site_url() ?>admin/karyawan/add">Add New &nbsp;<i class="fa fa-plus"></i>
                        </a>

                        
                        <div id="gallery" class="media-gal">
                        	<?php foreach($karyawan as $data):?>
                            <div class="images item " >
                                <a href="<?= base_url('assets/upload/karyawan/'.$data->karyawan_image) ?>" data-fancybox data-caption="<?php echo $data->karyawan_nama; ?>">
                                <img src="<?= base_url('assets/upload/karyawan/'.$data->karyawan_image) ?>" alt="" /></a>
                                <p><?php echo $data->karyawan_nama; ?></p><br>
                                <p><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/karyawan/delete/<?= $data->karyawan_id ?>')" href="#!"><i class="fa fa-trash-o"></i></a></p>
                        	</div>

                        	<?php endforeach; ?>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->

<script src="<?php echo base_url('assets/adm/js/jquery.isotope.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        var $container = $('#gallery');
        $container.isotope({
            itemSelector: '.item',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        // filter items when filter link is clicked
        $('#filters a').click(function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({filter: selector});
            return false;
        });
    });
</script>