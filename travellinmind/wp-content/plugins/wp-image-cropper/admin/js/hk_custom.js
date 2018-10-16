jQuery(document).ready(function () {
    jQuery(document).oc("click", "#getDataURL2", function () {
        var image_data = jQuery("#dataURLInto").val();
        if (image_data != '') {
            jQuery("#crop_image_id").trigger("click");
        }
    });
});