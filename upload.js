/********文件下载***********/
$('#dowln_btn').click(function(){
    var img = $('.image');
    var url_item = []
            order_img.each(function(item){
                var url = $(this);
                    url = url.find('img').attr('src');
                    url_item.push(url);
            })
   console.log(url_item);
   window.open("http://localhost/upload.php?data_img="+JSON.stringify(url_item));
})
