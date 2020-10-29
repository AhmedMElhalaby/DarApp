function ImageViewCrud(input,name) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#Image-crud-'+name)
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
};
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});
