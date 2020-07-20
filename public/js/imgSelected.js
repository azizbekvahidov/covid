var j = 1;

$(document).on("change", ".files", function (evt) {
    j++;
    let input = document.createElement("input");
    input.type      = "file";
    input.name      = "files[]";
    input.accept    = "image/*";
    input.id        = "file_" + j;
    input.className = "files";
    input.hidden    = "hidden";
    $(".file_block").append(input);
    $("#label").attr("for", "file_" + j);

    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            var div = document.createElement('div');
            div.id  = "preview_" + (j-1);
            div.className  = "preview";
            div.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');

            var closeButton = document.createElement('button');
            closeButton.className    = "close_item";
            closeButton.setAttribute("preview", "file_" + (j-1));
            closeButton.type         = "button";
            closeButton.innerHTML = "<span class='close_icon'>&#10005;</span>";
            document.getElementById('selected-media').insertBefore(div, null);
            document.getElementById('preview_' + (j-1)).insertBefore(closeButton, null);
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
});

$(document).on("click", ".close_item", function () {
    let target  = $(this),
        file_id = target.attr("preview");

    target.parent().detach();
    $("#" + file_id).detach();
    console.log();
});
