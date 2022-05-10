function generateGallery(json_data) {
    var gallery = document.getElementById("gallery");

    for (var i = 0; i < json_data.length; i++) {
        var img = document.createElement("img");
        img.src = json_data[i].path;
        img.alt = json_data[i].name;
        img.title = json_data[i].name;
        img.className = "grid-item" + " " + json_data[i].description;
        gallery.appendChild(img);
    }
}