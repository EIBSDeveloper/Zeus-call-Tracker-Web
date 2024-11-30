

<!--begin::Javascript-->
<script>
var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?php echo base_url();?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="<?php echo base_url();?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
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
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<!--end::Custom Javascript-->
<script>
    const currentUrl = document.URL;

    // Header Menu Start
    var menu_hd_dashboards = document.getElementById("menu_hd_dashboards");
    var menu_hd_mng_callers = document.getElementById("menu_hd_mng_callers");
    var menu_hd_mng_log = document.getElementById("menu_hd_mng_log");
    if(currentUrl.includes('Dashboard'))
    {
        menu_hd_dashboards.classList.add("here");
        menu_hd_mng_callers.classList.remove("here");
        menu_hd_mng_log.classList.remove("here");
    }
    else if (currentUrl.includes('Manage_callers'))
    {   
        menu_hd_dashboards.classList.remove("here");
        menu_hd_mng_callers.classList.add("here");
        menu_hd_mng_log.classList.remove("here");
    }
    else if (currentUrl.includes('Manage_log'))
    {   
        menu_hd_dashboards.classList.remove("here");
        menu_hd_mng_callers.classList.remove("here");
        menu_hd_mng_log.classList.add("here");
    }
    else{
        // alert("else");
        // myDrawer.setAttribute("data-kt-app-sidebar-minimize", "off");
    };
</script>
<!--end::Javascript-->

