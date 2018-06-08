//tooltip组件
$(function () {
    $('.grid-view a').tooltip();
})
//上传文件预览
function preview(file) {
    if (file.length > 0) {
        var title = '图片预览';
        var content;
        var image = /^(.*)\.(jpg|bmp|gif|jpeg|png)$/;
        var flash = /^(.*)\.(swf)$/;
        var audio = /^(.*)\.(mid|mp3|wma)$/;
        if (image.test(file)) {
            title = "图片预览";
            content = "<div><img src=\"" + file + "\" style=\"max-width:400px;\"></div>";
        }
        if (flash.test(file)) {
            title = "动画预览";
            content = "<div><embed src=\"" + file + "\" quality=\"high\" type=\"application/x-shockwave-flash\"/></embed></div>";
        }
        if (audio.test(file)) {
            title = "音乐预览";
            content = "<div><audio src=\"" + file + "\" controls=\"controls\" autoplay=\"autoplay\"></audio></div>";
        }
        dialog({title: title, content: content}).showModal();
    }
}