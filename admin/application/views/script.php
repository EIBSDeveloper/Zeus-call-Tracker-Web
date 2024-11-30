

<!--begin::Javascript-->
<script>
var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?php echo base_url();?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<!-- <script src="< ?php echo base_url();?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script> -->
<!-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script> -->
<script src="<?php echo base_url();?>assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="<?php echo base_url();?>assets/js/widgets.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/custom/widgets.js"></script>
<!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
<script src="<?php echo base_url();?>assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<!-- <script src="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"></script> -->
<!-- <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> -->
<!--end::Custom Javascript-->
<script>
    const currentUrl = document.URL;

    // Header Menu Start
    var menu_hd_dashboards = document.getElementById("menu_hd_dashboards");
    var menu_hd_mng_subs = document.getElementById("menu_hd_mng_subs");
    var menu_hd_mng_pckg = document.getElementById("menu_hd_mng_pckg");

    var menu_hd_sett = document.getElementById("menu_hd_sett");
    var menu_hd_gen_sett = document.getElementById("menu_hd_gen_sett");
    var menu_hd_coup_sett = document.getElementById("menu_hd_coup_sett");

    if(currentUrl.includes('Dashboard'))
    {
        menu_hd_dashboards.classList.add("here");
        menu_hd_mng_subs.classList.remove("here");
        menu_hd_mng_pckg.classList.remove("here");

        menu_hd_sett.classList.remove("here");
        menu_hd_gen_sett.classList.remove("active");
        menu_hd_coup_sett.classList.remove("active");
    }
    else if (currentUrl.includes('Subscription_management'))
    {   
        menu_hd_dashboards.classList.remove("here");
        menu_hd_mng_subs.classList.add("here");
        menu_hd_mng_pckg.classList.remove("here");

        menu_hd_sett.classList.remove("here");
        menu_hd_gen_sett.classList.remove("active");
        menu_hd_coup_sett.classList.remove("active");
    }
    else if (currentUrl.includes('Package_management'))
    {   
        menu_hd_dashboards.classList.remove("here");
        menu_hd_mng_subs.classList.remove("here");
        menu_hd_mng_pckg.classList.add("here");

        menu_hd_sett.classList.remove("here");
        menu_hd_gen_sett.classList.remove("active");
        menu_hd_coup_sett.classList.remove("active");
    }
    else if (currentUrl.includes('Generalsettings'))
    {   
        menu_hd_dashboards.classList.remove("here");
        menu_hd_mng_subs.classList.remove("here");
        menu_hd_mng_pckg.classList.remove("here");

        menu_hd_sett.classList.add("here");
        menu_hd_gen_sett.classList.add("active");
        menu_hd_coup_sett.classList.remove("active");
    }
    else if (currentUrl.includes('Couponcode'))
    {   
        menu_hd_dashboards.classList.remove("here");
        menu_hd_mng_subs.classList.remove("here");
        menu_hd_mng_pckg.classList.remove("here");

        menu_hd_sett.classList.add("here");
        menu_hd_gen_sett.classList.remove("active");
        menu_hd_coup_sett.classList.add("active");
    }
    else{
        // alert("else");
        // myDrawer.setAttribute("data-kt-app-sidebar-minimize", "off");
    };
</script>
<!--end::Javascript-->

