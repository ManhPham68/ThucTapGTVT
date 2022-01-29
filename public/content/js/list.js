/*$(function (){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
});*/

// $('#sidebarToggle').click(function(){
//     let urlRequest=$(this).data('url');
//     $.ajax({
//         type: "GET",
//         url: urlRequest,
//        /* data: { },*/
//         success: function(data){
//             alert(data);
//             $('.content').html(data);
//         }
//     });
//
// });

function actionDelete(event){
    event.preventDefault();//cắt reload
    let urlRequest=$(this).data('url');
    let that = $(this);
    /*alert(urlRequest);*/
    Swal.fire({
        title: 'Bạn có chắc chắn xóa không?',
        text: "Sẽ không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:'GET',
                url:urlRequest,
                success:function (data){
                    if(data.code==200){
                       that.parent().parent().remove();
                        Swal.fire(
                            'Xóa thành công!',
                            'Đã xóa thành công',
                            'success'
                        )
                    }

                },
                error:function (){

                },
            });

        }
    })
}
$(function (){

    $(document).on('click','#xoa',actionDelete);

});
$(function (){
       /* tinymce.init({
        selector: "#mytextarea",
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'*/
        var editor_config = {
        path_absolute : "/",
        selector: '#mytextarea',
        relative_urls: false,
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
    } else {
        cmsURL = cmsURL + "&type=Files";
    }

        tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
        callback(message.content);
    }
    });
    }
    };

        tinymce.init(editor_config);



});


