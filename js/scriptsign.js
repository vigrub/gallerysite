function start() {
    var rotator = document.body  
    var imageDir = "javaimg/";                          
    var delayInSeconds = 7;                            
    var images = ["northgard4.jpg","northgard5.jpg","northgard6.jpg","northgard7.jpg"];

    for (const img in images){
        var preloadLink = document.createElement("link")
        preloadLink.href = imageDir + images[img]
        preloadLink.rel = "preload"
        preloadLink.as = "image"
        document.head.appendChild(preloadLink)
    }

    var num = 0;
    var changeImage = function() {
        var len = images.length;
        rotator.style.backgroundImage = "url(" + imageDir + images[num]+ ")";
        num ++
        if (num == len){
            num = 0
        }
    };
    changeImage()
    setInterval(changeImage, delayInSeconds * 1000);
};

start()